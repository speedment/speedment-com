<?php
/*
 * Template Name: OS Download Page
 * Description: Page template that shows a trial license configurator form
 */
get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="trial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col" style="font-size: 1.5em">
                Fill in your project details to start your open source project.
            </div>
        </div>
        <div class="row justify-content-center gray-area">
            <div class="col-md-6 col-sm-12 config-column">
                <div class="row">
                    <div class="col title-area">
                        Speedment OSS Initalizer
                    </div>
                </div>

                <?php /////////////////////////////////////////////////////////////// ?>
                <?php //                     Configuration Form                    // ?>
                <?php /////////////////////////////////////////////////////////////// ?>

                <form method="post" id="speedmentForm">

                    <!-- Select Database Type -->
                    <div class="form-group row">
                        <legend class="col-form-legend col-sm-4">Database Type</legend>
                        <div class="col-sm-8">
                            <select name="DatabaseType" class="form-select" id="databaseType">
                                <option value="sqlite">SQLite</option>
                                <option value="mysql" selected="selected">MySQL</option>
                                <option value="postgresql">PostgreSQL</option>
                                <option value="mariadb">Maria DB</option>
                            </select>
                        </div>
                    </div>

                    <!-- Select Driver Version -->
                    <div class="form-group row">
                        <label for="inputDriverVersion" class="col-sm-4 col-form-label">JDBC Driver
                            <a style="color: gray" href="#" data-toggle="popover" data-trigger="hover"
                               data-placement="bottom"
                               data-content="The default value provided is the supported JDBC driver.">
                                <i class="fa fa-question-circle"></i>
                            </a>
                        </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputDriverVersion"
                                   placeholder="Database Driver Version" value="8.0.18">
                        </div>
                    </div>

                    <!-- Select Java Version -->
                    <div class="form-group row">
                        <legend class="col-form-legend col-sm-4">Java Version</legend>
                        <div class="col-sm-8">
                            <select name="JavaVersion" class="form-select" id="javaVersion">
                                <option value="1.8" selected="selected">Java 8</option>
                                <option value="11">Java 11</option>
                            </select>
                        </div>
                    </div>

                    <!-- Java Modules  -->
                    <div class="form-group row">
                        <legend class="col-form-legend col-sm-4">Java Modules
                            <a style="color: gray" href="#" data-toggle="popover" data-trigger="hover"
                               data-placement="bottom"
                               data-content="Enable this if your application will use the Java Platform Module System (JPMS)">
                                <i class="fa fa-question-circle"></i>
                            </a></legend>
                        <div class="col-sm-8" id="javaModules">
                            <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="modules" id="inputModulesTrue"
                                       value="true" disabled>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Enable</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="modules" id="inputModulesFalse"
                                       value="false" checked disabled>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Disable</span>
                            </label>
                        </div>
                    </div>

                    <!-- Plugins -->
                    <div class="form-group row">
                        <legend class="col-form-legend col-sm-4">Plugins</legend>
                        <div class="col-sm-8">
                            <label class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="checkPluginEnums">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Enums</span>
                            </label>
                            <label class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="checkPluginJson">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">JSON</span>
                            </label>
                        </div>
                    </div>

                    <!-- Project Info -->
                    <div class="form-group row">
                        <label for="inputGroupId" class="col-sm-4 col-form-label">GroupId</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputGroupId" placeholder="GroupId"
                                   value="com.example">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputArtifactId" class="col-sm-4 col-form-label">ArtifactId</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputArtifactId" placeholder="ArtifactId"
                                   value="demo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputVersion" class="col-sm-4 col-form-label">Version</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputVersion" placeholder="Version"
                                   value="1.0.0-SNAPSHOT">
                        </div>
                    </div>
                </form>
                <!-- Submit -->
                <div class="form-group-submit row" id="submitGroup">
                    <div class="col download-btn-area">
                        <button type="submit" class="btn btn-primary" id="downloadBtn">Download</button>
                    </div>
                </div>
            </div>

            <?php ///////////////////////////////////////////////////////////////// ?>
            <?php //                      Preview Column                         // ?>
            <?php ///////////////////////////////////////////////////////////////// ?>

            <div class="col-md-6 col-sm-12 preview-column">
                <div class="row tab-row d-none d-md-block">
                    <div class="col-5 pom-tab">
                        pom.xml
                    </div>
                </div>
                <div class="tab-pane active" id="fileMaven" role="tabpanel">
                    <pre class="preview-os"><code class="language-xml" class="preview-os"
                                                  id="previewMaven"></code></pre>
                </div>
            </div>

            <?php ///////////////////////////////////////////////////////////////// ?>
            <?php //                      Form logic                             // ?>
            <?php ///////////////////////////////////////////////////////////////// ?>

            <script>
                jQuery.fn.extend({
                    disable: function (state) {
                        return this.each(function () {
                            this.disabled = state;
                        });
                    }
                });
                jQuery(document).ready(function ($) {
                    var groupId = $('#inputGroupId');
                    var artifactId = $('#inputArtifactId');
                    var version = $('#inputVersion');
                    var driverVersion = $('#inputDriverVersion');
                    var email = $('#inputEmail');
                    var javaVersion = $('#javaVersion');
                    var dbType = $('#databaseType');
                    var modules = $('input[type=radio][name=modules]');
                    var useEnums = $('#checkPluginEnums');
                    var useJson = $('#checkPluginJson');
                    var enterprise = false;
                    var enterpriseDb = false;

                    function prepareUrl(service) {
                        var selectedDbType = $('#databaseType').val();
                        var url = 'https://service.speedment.com/' + service;
                        url += '/' + selectedDbType;

                        if (useEnums.is(':checked')) {
                            url += ',enums';
                        }

                        if (useJson.is(':checked')) {
                            url += ',json';
                        }

                        url += '?groupId=' + encodeURIComponent(groupId.val());
                        url += '&artifactId=' + encodeURIComponent(artifactId.val());
                        url += '&version=' + encodeURIComponent(version.val());

                        if ($('#javaVersion').val()) {
                            url += '&javaVersion=' + encodeURIComponent($('#javaVersion').val());
                        }

                        url += '&jdbcVersion=' + encodeURIComponent(driverVersion.val());

                        if ('true' == $('input[type=radio][name=modules]:checked').val()) {
                            url += '&module=true';
                        }

                        return url;
                    }


                    function updateModules() {
                        if ('11' === $('#javaVersion').val()) {
                            document.getElementById("inputModulesTrue").disabled = false;
                            document.getElementById("inputModulesTrue").click();
                            document.getElementById("inputModulesFalse").disabled = false;
                        } else {
                            document.getElementById("inputModulesTrue").disabled = true;
                            document.getElementById("inputModulesFalse").click();
                            document.getElementById("inputModulesFalse").disabled = true;
                        }
                    }

                    function updateCode() {
                        var url;
                        var page;
                        var lang;
                        if ($('.preview-column .tab-content .tab-pane.active').attr('id') === 'fileMain') {
                            page = 'Main';
                            url = prepareUrl('generate/main');
                            lang = Prism.languages.java;
                        } else {
                            page = 'Maven';
                            url = prepareUrl('generate/maven');
                            lang = Prism.languages.xml;
                        }
                        var container = $('#preview' + page);
                        container.fadeOut(100);
                        $.ajax({
                            url: url,
                            type: "GET",
                            crossDomain: true,
                            dataType: 'text',
                            success: function (data) {
                                console.log(data);
                                $('#preview' + page).text(data).fadeIn(100);
                                Prism.highlightAll();
                            },
                            error: function (xhr, status) {
                                console.error(xhr);
                                console.error('Error! Server responded with ' + status + '.');
                            }
                        });
                    }

                    groupId.change(updateCode);
                    artifactId.change(updateCode);
                    version.change(updateCode);
                    driverVersion.change(updateCode);

                    javaVersion.change(function () {
                        updateCode();
                        updateModules();
                    });
                    modules.change(function() {
                        updateCode();
                    });

                    dbType.change(function () {
                        if (this.value === 'mysql') {
                            driverVersion.val('8.0.19');
                        } else if (this.value === 'sqlite') {
                            driverVersion.val('3.30.1');
                        } else if (this.value === 'postgresql') {
                            driverVersion.val('42.2.9');
                        } else if (this.value === 'mariadb') {
                            driverVersion.val('2.5.4');
                        } else {
                            console.error('Unknown database type "' + this.value + '".');
                            return;
                        }
                        updateCode();
                    });

                    useEnums.click(updateCode);
                    useJson.click(updateCode);
                    updateCode();

                    $('#speedmentForm').submit(function (ev) {
                        ev.preventDefault();
                        $.ajax({
                            url: prepareUrl('generate/maven'),
                            type: "GET",
                            crossDomain: true,
                            dataType: 'text',
                            success: function (data) {
                                console.log(data);
                                $('#finalCode').text(data);
                                Prism.highlightAll();
                                $('#generationComplete').modal('show');
                            },
                            error: function (xhr, status) {
                                console.error(xhr);
                                console.error('Error! Server responded with ' + status + '.');
                            }
                        });
                    });

                    function downloadURI(uri, name) {
                        var link = document.createElement("a");
                        document.getElementById('speedmentForm').append(link);
                        link.download = name;
                        link.href = uri;
                        link.click();
                        link.remove();
                    }

                    $('#downloadBtn').click(function (ev) {
                        ev.preventDefault();
                        $('#downloadBtn').prop('disabled', true);
                        console.log('Downloading .zip-file.');
                        downloadURI(prepareUrl('generate/zip'), artifactId.val() + '.zip');
                        // The .click() call in downloadURI starts off asynchronous handlers
                        // that in Firefox do not play nicely with the ajax call below.
                        // Therefore we delay the ajax call with 2000ms, pending a more elegant solution.
                        setTimeout(function () {
                            $(document).scrollTop(0);
                            // Needed to get proper statistics, this rewrites the url without triggering reload
                            history.pushState('Speedment Download', 'download', '/oss-quick-start');
                            $.ajax({
                                url: '/oss-quick-start/',
                                xhrFields: {withCredentials: true},
                                success: function (data) {
                                    console.log('Show oss-quick-start');
                                    var starts = data.indexOf("<body");
                                    starts = data.indexOf(">", starts) + 1;
                                    var ends = data.lastIndexOf("</body>");
                                    var body = data.slice(starts, ends);
                                    $('body').html(body);
                                },
                                complete: function (jqXHR, textStatus) {
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                }
                            });
                        }, 2000);
                    });
                });

                jQuery(function ($) {
                    $('[data-toggle="popover"]').popover()
                })
            </script>

            <?php include('trial-modal.php'); ?>

            <div id="generationComplete" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                 aria-labelledby="popupTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Success!</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Your project has been generated! To build it, create a file
                                somewhere on your computer called <span class="code">pom.xml</span>
                                and insert the following text:</p>
                            <pre style="max-height:320px;"><code class="language-xml" id="finalCode"></code></pre>
                            <p>To launch the Speedment Tool, run the following command in your terminal:</p>
                            <pre><code class="language-shell">mvn speedment:tool</code></pre>
                            <p>To compile the Maven project, run:</p>
                            <pre><code class="language-shell">mvn clean install</code></pre>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div id="contribute-init">
                <div class="row">
                    <div class="col lightgray">
                        <h4>Contribute</h4>
                        <p>The Speedment Open Source project is available under the <a
                                    href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache 2.0
                                License</a>. We gladly welcome, and encourage contributions from the community. If you
                            have something to add, need to file an issue or simply want to browse the source code, pay
                            the project a visit on <a href="http://www.github.com/speedment/speedment" target="_blank">GitHub</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
