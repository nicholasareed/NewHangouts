<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Dropbox File Uploader With Twitter Bootstrap | Tutorialzine </title>

        <!-- The stylesheets -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css"  />
        <link rel="stylesheet" href="assets/Jcrop/jquery.Jcrop.min.css" />
        <link rel="stylesheet" href="assets/css/styles.css"  />
    </head>
    <body>

        <div id="main">

            <input type="dropbox-chooser" name="selected-file" id="db-chooser"
                        data-link-type="direct" class="hide" />
            <div id="content"></div>
            <button class="btn btn-inverse hide" type="button"
                        id="cropButton">Crop Image</button>

            <!-- Bootstrap Modal Dialogs -->

            <div id="cropModal" class="modal hide fade" role="dialog"
                        aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">×</button>
                    <h4>Your cropped image</h4>
                </div>
                <div class="modal-body center"></div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </div>

            <div id="errorModal" class="modal hide fade" role="dialog" aria-hidden="true">
                <div class="modal-header">
                    <h4></h4>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal"
                        aria-hidden="true">OK</button>
                </div>
            </div>

            <div id="progressModal" class="modal hide fade" role="dialog" aria-hidden="true">
                <div class="progress progress-striped active">
                    <div class="bar" style="width: 100%;"></div>
                </div>
            </div>

        </div>

        <!-- JavaScript Includes -->
        <script src="https://www.dropbox.com/static/api/1/dropbox.js"
            id="dropboxjs" data-app-key="rwq7upg3h1oo6u6"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/Jcrop/jquery.Jcrop.min.js"></script>
        <script src="assets/js/script.js"></script>

    </body>
</html>