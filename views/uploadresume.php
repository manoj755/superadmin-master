<html>
    <head>
        <script src="../js/config.js"></script>
        <script>
            var id = 0;
            var url = '';
            function setData(_id, _url)
            {
                id = _id;
                url = _url;

                submitform();
            }
        </script>

    </head>
    <body style="padding:0; margin: 0;">
        <?php
        if (count($_POST) > 0) {
            echo "Uploaded successfully .";
        } else {
            ?>
            <form id="formupload" method="post" action="" enctype="multipart/form-data">

                <input type="file" id="uploadBox"  accept="" name="resume" />
                <input type="hidden" name="islocal" id="islocal" value="yes"/>
            </form>
            <script>


                var form = document.getElementById('formupload');
                if (config.url.indexOf('laravel/public/') === -1) {
                    document.getElementById('islocal').value = 'no';
                }


                function submitform() {
                    if (document.getElementById("uploadBox").value != "") {
                        form.action = config.url + url + '/' + id + '?token=' + config.token();
                        form.submit();
                    }
                }

            </script>
            <?php
        }
        ?>
    </body>
</html>