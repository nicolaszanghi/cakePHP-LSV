

    // to get path
    var getLocation = function(href) {
        var l = document.createElement("a");
        l.href = href;
        return l;
    };
    var path = getLocation(window.site_url);

    /**
     * open KCFinder
     * @param div
     * @param id_input
     */
    function openKCFinder(div, id_input) {

        window.KCFinder = {
            callBack: function(url) {
                window.KCFinder = null;
                div.innerHTML = '<div style="margin:5px">Loading...</div>';
                var img = new Image();
                img.src = url;
                $('#'+id_input).attr('value',  url.replace(path.pathname, '').split('webroot').pop());
                img.onload = function() {
                    div.innerHTML = '<img id="img" src="' + url + '" />';
                    var img = document.getElementById('img');
                    var o_w = img.offsetWidth;
                    var o_h = img.offsetHeight;
                    var f_w = div.offsetWidth;
                    var f_h = div.offsetHeight;
                    if ((o_w > f_w) || (o_h > f_h)) {
                        if ((f_w / f_h) > (o_w / o_h))
                            f_w = parseInt((o_w * f_h) / o_h);
                        else if ((f_w / f_h) < (o_w / o_h))
                            f_h = parseInt((o_h * f_w) / o_w);
                        img.style.width = f_w + "px";
                        img.style.height = f_h + "px";
                    } else {
                        f_w = o_w;
                        f_h = o_h;
                    }
                    img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                    img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                    img.style.visibility = "visible";
                }
            }
        };


        window.open(site_url+'/kcfinder/browse.php?type=images&dir=images/public',
            'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }

    /**
     *
     * @param textarea
     */
    function openKCFinderMultipleFiles(textarea_id) {
        textarea = $(textarea_id);
        window.KCFinder = {
            callBackMultiple: function(files) {
                window.KCFinder = null;
                var val = '';
                for (var i = 0; i < files.length; i++) {
                    files[i] = files[i].replace(path.pathname, '').split('webroot').pop();
                    val += files[i] + "\n";
                }
                textarea.val(val);
            }
        };
        window.open(site_url+'/kcfinder/browse.php?type=images&dir=images/public',
            'kcfinder_multiple', 'status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
    }


