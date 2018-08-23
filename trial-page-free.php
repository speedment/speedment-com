<?php
/*
 * Template Name: Download Speedment
 * Description: Page template that shows a trial license configurator form
 */
get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="trial">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <p>The Initializer makes it easy to setup a new Speedment project with Maven. Fill in your project details and see the configuration change in real time. 
          
          Just send us a request and you will <a href="#" data-toggle="modal" data-target="#trialModal">get a 30 days free trial license</a>!</p>
      </div>
    </div>
    <div class="row justify-content-center gray-area">
      <div class="col-md-6 col-sm-12 config-column">
        <div class="row">
          <div class="col title-area">
            Speedment Initalizer
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
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType1" value="mysql" checked>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">MySQL</span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType2" value="postgresql">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">PostgreSQL</span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType3" value="mariadb">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">MariaDB</span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType4" value="oracle">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Oracle</span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType5" value="db2">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">DB2</span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType6" value="as400">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">AS400</span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType7" value="mssql">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">SQL Server</span>
              </label>
            </div>
          </div>

          <!-- Select Driver Version -->
          <div class="form-group row">
            <label for="inputDriverVersion" class="col-sm-4 col-form-label">JDBC Driver Version</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputDriverVersion" placeholder="Database Driver Version" value="5.1.46">
              <small id="helpDriverVersion" class="text-muted nosize" style="display:none">
                Make sure this driver is available on your development machine.
              </small>
            </div>
          </div>
          
          <!-- Select Java Version -->
          <div class="form-group row">
            <legend class="col-form-legend col-sm-4">Java Version</legend>
            <div class="col-sm-8">
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="javaVersion" id="inputJava8" value="1.8" checked>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Java 8</span>
              </label>
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="javaVersion" id="inputJava9" value="9">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Java 9</span>
              </label>
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="javaVersion" id="inputJava10" value="10">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Java 10</span>
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
                <input class="custom-control-input" type="checkbox" id="checkPluginSpring">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Spring</span>
              </label>
              <label class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="checkPluginJson">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">JSON</span>
              </label>
            </div>
          </div>

          <!-- In-memory Acceleration -->
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">In-memory Acceleration</label>
            <div class="col-sm-8" id="inMemoryContainer">
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="inMemory" id="inputInMemoryTrue" value="true" checked>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Enable</span>
              </label>
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="inMemory" id="inputInMemoryFalse" value="false">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Disable</span>
              </label>
            </div>
          </div>

          <!-- Project Info -->
          <div class="form-group row">
            <label for="inputGroupId" class="col-sm-4 col-form-label">GroupId</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputGroupId" placeholder="GroupId" value="com.example">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputArtifactId" class="col-sm-4 col-form-label">ArtifactId</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputArtifactId" placeholder="ArtifactId" value="demo">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputVersion" class="col-sm-4 col-form-label">Version</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="inputVersion" placeholder="Version" value="1.0.0-SNAPSHOT">
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
            <pre class="preview"><code class="language-xml" class="preview" id="previewMaven"></code></pre>
          </div>
      </div>

      <?php ///////////////////////////////////////////////////////////////// ?>
      <?php //                      Form logic                             // ?>
      <?php ///////////////////////////////////////////////////////////////// ?>

      <script>
        jQuery.fn.extend({
          disable: function(state) {
            return this.each(function() {
              this.disabled = state;
            });
          }
        });
        jQuery(document).ready(function($) {
          var groupId       = $('#inputGroupId');
          var artifactId    = $('#inputArtifactId');
          var version       = $('#inputVersion');
          var driverVersion = $('#inputDriverVersion');
          var email         = $('#inputEmail');
       // var licenseKey    = $('#inputLicenseKey');
          var javaVersion   = $('input[type=radio][name=javaVersion]');
          var inMemory      = $('input[type=radio][name=inMemory]');
          var dbType        = $('input[type=radio][name=radioDatabaseType]');
          
          var useEnums  = $('#checkPluginEnums');
          var useSpring = $('#checkPluginSpring');
          var useJson   = $('#checkPluginJson');
          var enterprise   = false;
          var enterpriseDb = false;
          function prepareUrl(service) {
            var selectedDbType = $('input[type=radio][name=radioDatabaseType]:checked').val();
            var url = 'https://service.speedment.com/' + service;
            url += '/' + (selectedDbType === 'as400' ? 'db2' : selectedDbType);
            if ('true' == $('input[type=radio][name=inMemory]:checked').val()) {
              url += ',datastore';
            }
            
            if (useEnums.is(':checked')) {
                url += ',enums';
            }
            
            if (useSpring.is(':checked')) {
                url += ',spring';
            }
            
            if (useJson.is(':checked')) {
                url += ',json';
            }
            
            url += '?groupId=' + encodeURIComponent(groupId.val());
            url += '&artifactId=' + encodeURIComponent(artifactId.val());
            url += '&version=' + encodeURIComponent(version.val());
            
            if ($('input[type=radio][name=javaVersion]:checked').val()) {
              url += '&javaVersion=' + encodeURIComponent($('input[type=radio][name=javaVersion]:checked').val());
            }
            
            url += '&jdbcVersion=' + encodeURIComponent(driverVersion.val());
            
            //var key = licenseKey.val().trim();
            //if (key) {
            //  url += '&licenseKey=' + encodeURIComponent(key);
            //}
            
            return url;
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
          function updateEnterprise() {
            var selectedDbType = $('input[type=radio][name=radioDatabaseType]:checked').val();
            enterpriseDb = selectedDbType === 'oracle'
                        || selectedDbType === 'db2'
                        || selectedDbType === 'as400'
                        || selectedDbType === 'mssql';
            enterprise = 'true' == $('input[type=radio][name=inMemory]:checked').val()
                      || enterpriseDb;
            //if (enterprise) {
            //  $('#licenseKey').show();
            //} else {
            //  $('#licenseKey').hide();
            //}
            if (enterpriseDb) {
              $('#helpDriverVersion').show();
            } else {
              $('#helpDriverVersion').hide();
            }
            //$('#submitGroup button[type="submit"]').disable(
            // enterprise && !licenseKey.val().trim()
            //);
          }
          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            updateCode();
          });
          groupId.change(updateCode);
          artifactId.change(updateCode);
          version.change(updateCode);
          driverVersion.change(updateCode);
          
          javaVersion.change(function() {
            updateCode();
          });
          inMemory.change(function() {
            updateEnterprise();
            updateCode();
          });
          //licenseKey.change(function() {
          //  updateEnterprise();
          // updateCode();
          //});
          dbType.change(function() {
            if        (this.value === 'mysql') {
                driverVersion.val('5.1.46');
            } else if (this.value === 'postgresql') {
                driverVersion.val('42.2.2');
            } else if (this.value === 'mariadb') {
                driverVersion.val('2.2.3');
            } else if (this.value == 'oracle') {
                driverVersion.val('12.1.0.1.0');
            } else if (this.value === 'db2') {
                driverVersion.val('4.21.29');
            } else if (this.value === 'as400') {
                driverVersion.val('9.1');
            } else if (this.value === 'mssql') {
                driverVersion.val('6.1.0.jre8');
            } else {
              console.error('Unknown database type "' + this.value + '".');
              return;
            }
            updateEnterprise();
            updateCode();
          });
          
          useEnums.click(updateCode);
          useSpring.click(updateCode);
          useJson.click(updateCode);
          updateEnterprise();
          updateCode();
          //licenseKey.keyup(function () {
          //  $('#submitGroup button[type="submit"]').disable(
          //    !licenseKey.val().trim()
          //  );
          //});
          $('#speedmentForm').submit(function(ev) {
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
            link.download = name;
            link.href = uri;
            link.click();
          }
          
          $('#downloadBtn').click(function(ev) {
            ev.preventDefault();
            console.log('Downloading .zip-file.');
            downloadURI(prepareUrl('generate/zip'));
            setTimeout(function() {
              location.href = '/quick-start';
            }, 1000);
          });
        });
      </script>

      <?php include('trial-modal.php'); ?>

      <div id="generationComplete" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
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
      <div class="col os-init-info">
        <h4>Looking for Speedment Open Source?</h4>
        <p>Please visit the <a href="https://speedment.com/os-download" target="_blank">Open Source Download page</a>.</p>
      </div>
    </div>
  </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
