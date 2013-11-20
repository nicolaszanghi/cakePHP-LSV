<?php
App::uses('FormHelper', 'View/Helper');

class CakestrapHelper extends FormHelper {

    public function input($fieldName, $options = array()) {

        parent::setEntity($fieldName);
        $options = parent::_parseOptions($options);

        /** class */
        if (empty($options['class'])) $options['class'] = '';
        if (empty($options['div']['class'])) $options['div']['class'] = '';

        /** placeholder */
        if (!isset($options['placeholder']))
            $options['placeholder'] = strip_tags(parent::_getLabel($fieldName, $options));


        $options['div']['class'] .= ' input '.$options['type'];

        /** radio, checkbox */
        if (in_array($options['type'], array('radio', 'checkbox'))) {
            $label = strip_tags(parent::_getLabel($fieldName, $options));
            $options['label'] = false;
            $options['before'] = '<label>';
            $options['after'] = $label.'</label>';

            /** multiple checkbox */
        } elseif (!empty($options['multiple']) && $options['multiple'] == 'checkbox') {
            $options['class'] .= ' checkbox';

            /** date/time => datetimeplicker */
        } elseif (in_array($options['type'], array('datetime', 'date', 'time'))) {

            $before_label = parent::_getLabel($fieldName, $options);
            $options['label'] = false;
            $options['div']['class'] .= ' datetimepicker input-group date';
            $data_format = array('datetime' => 'yyyy-MM-dd hh:mm:ss', 'date' => 'yyyy-MM-dd', 'time' => 'hh:mm:ss');
            $options['data-format'] = $data_format[$options['type']];
            $options['class'] .= ' form-control';
            $options['after'] = '<span class="input-group-addon">
                                    <i data-time-icon="glyphicon glyphicon-time" data-date-icon="glyphicon glyphicon-calendar"></i>
                                 </span>';
            $options['type'] = 'text';

            /** search */
        } elseif ($options['type'] == 'search') {

            $options['label'] = false;
            $options['div']['class'] .= ' input-group';
            $options['class'] .= ' form-control';
            $options['after'] = '<span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">'.__('Search').'</button>
                                 </span>';
            $options['type'] = 'text';

            /** normal input */
        } else {
            $options['div']['class'] .= ' form-group';
            $options['class'] .= ' form-control';
        }

        $options['required'] = false;

        /** help-block */
        if (!empty($options['help-block']))
            $options['after'] .= "\n\t".'<p class="help-block">'.$options['help-block'].'</p>';


        /** if local option is true display an input per languages */
        if (!empty($options['locale'])) {
            $output = '';
            $placeholder = $options['placeholder'];
            $label = (empty($options['label'])) ? strip_tags(parent::_getLabel($fieldName, $options)) : $options['label'];

            // get translations, for edit
            if (!empty($this->request->data)) {
                $translations_tmp = $this->request->data[end(explode('.', $fieldName)).'Translation'];
                $translations = array();
                foreach ($translations_tmp as $translation)
                    $translations[$translation['locale']] = $translation['content'];
            }

            foreach (Configure::read('Config.languages') as $k => $v) { // eng => English, fra => Français
                if (!empty($placeholder)) $options['placeholder'] = $placeholder.' ('.$v.')';
                if (!empty($label)) $options['label'] = $label.' ('.$v.')';
                if (!empty($translations)) $options['value'] = $translations[$k];
                $output .= parent::input($fieldName.'.'.$k, $options);
            }


            /** normal output (without translation) */
        } else {
            $output = parent::input($fieldName, $options);
        }

        /** before label */
        if (!empty($before_label)) // label outside div
            $output = $before_label.$output;

        return $output;

    }
}
