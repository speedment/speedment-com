<?php
/*
 * Template Name: Trial Page
 * Description: Page template that shows a trial license configurator form
 */

get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="trial">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        The Initializer makes it easy to setup a new Speedment project with Maven. Fill in your project details and see the configuration change in real time. If you choose any Enterprise features you will be asked to fill in a License Key. Just send us a request and you will <a href="#" data-toggle="modal" data-target="#trialModal">get a 30 days free trial license</a>!
      </div>
    </div>
    <div class="row justify-content-center gray-area">
      <div class="col-md-6 col-sm-12 config-column">

        <?php /////////////////////////////////////////////////////////////// ?>
        <?php //                     Configuration Form                    // ?>
        <?php /////////////////////////////////////////////////////////////// ?>

        <form method="post" id="speedmentForm">

          <!-- Select Database Type -->
          <div class="form-group row">
            <legend class="col-form-legend col-sm-3">Database Type</legend>
            <div class="col-sm-9">
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
                <span class="custom-control-description">Oracle<i class="fa fa-asterisk" aria-hidden="true"></i></span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType5" value="db2">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">DB2<i class="fa fa-asterisk" aria-hidden="true"></i></span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType6" value="as400">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">AS400<i class="fa fa-asterisk" aria-hidden="true"></i></span>
              </label>
              <label class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="radioDatabaseType" id="radioDatabaseType7" value="mssql">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">SQL Server<i class="fa fa-asterisk" aria-hidden="true"></i></span>
              </label>
            </div>
          </div>

          <!-- Select Driver Version -->
          <div class="form-group row">
            <label for="inputDriverVersion" class="col-sm-3 col-form-label">JDBC Driver Version</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputDriverVersion" placeholder="Database Driver Version" value="5.1.46">
              <small id="helpDriverVersion" class="text-muted nosize" style="display:none">
                Make sure this driver is available on your development machine.
              </small>
            </div>
          </div>
          
          <!-- Select Java Version -->
          <div class="form-group row">
            <legend class="col-form-legend col-sm-3">Java Version</legend>
            <div class="col-sm-9">
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
            <legend class="col-form-legend col-sm-3">Plugins</legend>
            <div class="col-sm-9">
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
            <label class="col-sm-3 col-form-label">In-memory Acceleration</label>
            <div class="col-sm-9" id="inMemoryContainer">
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="inMemory" id="inputInMemoryTrue" value="true" checked>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Enable<i class="fa fa-asterisk" aria-hidden="true"></i></span>
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
            <label for="inputGroupId" class="col-sm-3 col-form-label">GroupId</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputGroupId" placeholder="GroupId" value="com.example">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputArtifactId" class="col-sm-3 col-form-label">ArtifactId</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputArtifactId" placeholder="ArtifactId" value="demo">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputVersion" class="col-sm-3 col-form-label">Version</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputVersion" placeholder="Version" value="1.0.0-SNAPSHOT">
            </div>
          </div>

          <!-- Submit -->
          <div class="form-group row" id="submitGroup">
            <div class="col align-middle">
              <div class="asteriskDescription">
               <!-- <i class="fa fa-asterisk" aria-hidden="true"></i>
                <small class="text-muted">Enterprise Features require a valid License Key.</small> -->
              </div>
            </div>
            <div class="col-md col-md-auto submit-group">
              <button type="submit" class="btn btn-primary">Generate Project</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-6 col-sm-12 preview-column">
         <!-- License Key -->
          <div class="form-group row" id="licenseKey" style="display:none;">
            <div style="overflow:hidden;position:relative;width:100%;height:100px;top:-10px;margin-bottom:-100px;margin-right:-100px;right:-2px;z-index:1;pointer-events:none;">
              <div class="cr cr-top cr-right cr-blue">Enterprise</div>
            </div>
              <label for="inputLicenseKey" class="col-sm-12 col-form-label">You have selected an Enterprise Feature<i class="fa fa-asterisk" aria-hidden="true"></i></label> 
            <div class="col-sm-12 row rightSide">
              <small class="request-trial-link">
                <a href="#" rel="Send me a trial" data-toggle="modal" data-target="#trialModal">Request a Free Trial License Key</a>
              </small>
              <textarea class="form-control col-12" id="inputLicenseKey" placeholder="Enter the License Key that has been sent to you"><?php
                if (isset($_GET['licenseKey'])) {
                  echo $_GET['licenseKey'];
                }
              ?></textarea>
            </div>
          </div>
        
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#fileMaven" role="tab">pom.xml</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#fileMain" role="tab">Main.java</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="fileMaven" role="tabpanel">
            <pre><code class="language-xml" class="preview" id="previewMaven"></code></pre>
          </div>
          <div class="tab-pane" id="fileMain" role="tabpanel">
            <pre><code class="language-java" class="preview" id="previewMain"></code></pre>
          </div>
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
          var licenseKey    = $('#inputLicenseKey');
          var javaVersion   = $('input[type=radio][name=javaVersion]');
          var inMemory      = $('input[type=radio][name=inMemory]');
          var dbType        = $('input[type=radio][name=radioDatabaseType]');
          
          var useEnums  = $('#checkPluginEnums');
          var useSpring = $('#checkPluginSpring');
          var useJson   = $('#checkPluginJson');

          var enterprise = false;
          var enterpriseDb = false;

          function prepareUrl(service) {
            var selectedDbType = $('input[type=radio][name=radioDatabaseType]:checked').val();
            var url = 'https://api.speedment.com:9010/' + service;
            url += '/' + (selectedDbType === 'as400' ? 'db2' : selectedDbType);

            if ('true' == $('input[type=radio][name=inMemory]:checked').val()) {
              url += ',virtual-columns,datastore';
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

            var args = {
              'groupId'     : groupId.val(),
              'artifactId'  : artifactId.val(),
              'version'     : version.val(),
              'packaging'   : 'jar'
            };
            
            if ($('input[type=radio][name=javaVersion]:checked').val()) {
              args.javaVersion = $('input[type=radio][name=javaVersion]:checked').val();
            }

            if (enterprise) {
              args['speedmentEnterpriseVersion'] = '3.1.3';
              args['runtimeGroupId']    = 'com.speedment.enterprise';
              args['runtimeArtifactId'] = 'runtime';
              args['runtimeVersion']    = '${speedment.enterprise.version}';
              args['pluginGroupId']     = 'com.speedment.enterprise';
              args['pluginArtifactId']  = 'speedment-enterprise-maven-plugin';
              args['pluginVersion']     = '${speedment.enterprise.version}';
            } else {
              args['speedmentVersion']  = '3.1.3';
              args['runtimeGroupId']    = 'com.speedment';
              args['runtimeArtifactId'] = 'runtime';
              args['runtimeVersion']    = '${speedment.version}';
              args['pluginGroupId']     = 'com.speedment';
              args['pluginArtifactId']  = 'speedment-maven-plugin';
              args['pluginVersion']     = '${speedment.version}';
            }

            if        (selectedDbType === 'mysql') {
              args['mysqlVersion'] = driverVersion.val();
            } else if (selectedDbType === 'postgresql') {
              args['postgresqlVersion'] = driverVersion.val();
            } else if (selectedDbType === 'mariadb') {
              args['mariadbVersion'] = driverVersion.val();
            } else if (selectedDbType === 'oracle') {
              args['oracleVersion'] = driverVersion.val();
            } else if (selectedDbType === 'db2') {
              args['db2Version'] = driverVersion.val();
            } else if (selectedDbType === 'as400') {
              args['as400Version'] = driverVersion.val();
            } else if (selectedDbType === 'mssql') {
              args['sqlserverVersion'] = driverVersion.val();
            }

            url += '?args=' + encodeURIComponent(JSON.stringify(args));

            var key = licenseKey.val().trim();
            if (key) {
              url += '&licenseKey=' + encodeURIComponent(key);
            }

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

            if (enterprise) {
              $('#licenseKey').show();
            } else {
              $('#licenseKey').hide();
            }

            if (enterpriseDb) {
              $('#helpDriverVersion').show();
            } else {
              $('#helpDriverVersion').hide();
            }
            $('#submitGroup button[type="submit"]').disable(
              enterprise && !licenseKey.val().trim()
            );
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

          licenseKey.change(function() {
            updateEnterprise();
            updateCode();
          });

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
          licenseKey.keyup(function () {
            $('#submitGroup button[type="submit"]').disable(
              !licenseKey.val().trim()
            );
          });
          $('#speedmentForm').submit(function(ev) {
            ev.preventDefault();
            $.ajax({
              url: prepareUrl('generate/maven'),
              type: "GET",
              crossDomain: true,
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
  </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
