<?php
/*
 * Template Name: Trial Page
 * Description: Page template that shows a trial license configurator form
 */

get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="trial">
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-md-6 col-sm-12 config-column">

        <?php /////////////////////////////////////////////////////////////// ?>
        <?php //                     Configuration Form                    // ?>
        <?php /////////////////////////////////////////////////////////////// ?>

        <form method="post" id="speedmentForm">

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
            <label for="inputDriverVersion" class="col-sm-3 col-form-label">JDBC Driver Version</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputDriverVersion" placeholder="Database Driver Version" value="5.1.40">
              <small id="helpDriverVersion" class="text-muted nosize" style="display:none">
                Must be available on your development machine.
              </small>
            </div>
          </div>

          <!-- In-memory Acceleration -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">In-memory Acceleration</label>
            <div class="col-sm-9" id="inMemoryContainer">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="inputInMemory">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Enabled</span>
              </label>
            </div>
          </div>

          <!-- Email Address -->
          <!--<div class="form-group row">
            <label for="inputEmail" class="col-sm-3 col-form-label">Send it to</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="inputEmail" placeholder="Your Email Address" value="">
            </div>
          </div>-->

          <!-- Email Address -->
          <div class="form-group row" id="licenseKey" style="display:none;">
            <label for="inputLicenseKey" class="col-sm-3 col-form-label">License Key</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="inputLicenseKey" placeholder="Your License Key"><?php
                if (isset($_GET['licenseKey'])) {
                  echo $_GET['licenseKey'];
                }
              ?></textarea>
              <small class="text-muted">
                Not a customer? <a href="/trial" rel="Send me a trial" data-toggle="modal" data-target="#trialModal">Send me a 30 Days Trial!</a>
              </small>
            </div>
          </div>

          <!-- Submit -->
          <div class="form-group row pull-right" id="submitGroup">
            <div class="col submit-group">
              <button type="submit" class="btn btn-primary">Generate Project</button>
              <!--
              <small class="text-muted" id="licenseApache2">License <a href="https://www.apache.org/licenses/LICENSE-2.0.html" rel="The Apache 2 License" target="_blank">Apache 2</a></small>
              <small class="text-muted" id="license30DaysTrial" style="display:none">License <a href="/terms" rel="Terms of Service" target="_blank">30 Days Free Trial</a></small>
              -->
            </div>
          </div>
        </form>
      </div>

      <div class="col-md-6 col-sm-12 preview-column">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#fileMain" role="tab">Main.java</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#fileMaven" role="tab">pom.xml</a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="fileMain" role="tabpanel">
            <pre class="code-toolbar"><code class="language-java" class="preview" id="previewMain">public static void main(String... args) {
  System.out.println("Hello, World!");
}</code></pre>
          </div>
          <div class="tab-pane" id="fileMaven" role="tabpanel">
            <pre class="code-toolbar"><code class="language-xml" class="preview" id="previewMaven"></code></pre>
          </div>
        </div>
      </div>

      <?php ///////////////////////////////////////////////////////////////// ?>
      <?php //                      Form logic                             // ?>
      <?php ///////////////////////////////////////////////////////////////// ?>

      <script>
        jQuery(document).ready(function($) {

          var groupId       = $('#inputGroupId');
          var artifactId    = $('#inputArtifactId');
          var version       = $('#inputVersion');
          var driverVersion = $('#inputDriverVersion');
          var inMemory      = $('#inputInMemory');
          var email         = $('#inputEmail');
          var licenseKey    = $('#inputLicenseKey');
          var dbType        = $('input[type=radio][name=radioDatabaseType]');

          var enterprise = false;
          var enterpriseDb = false;

          function prepareUrl(service) {
            var selectedDbType = $('input[type=radio][name=radioDatabaseType]:checked').val();
            var url = 'http://api.speedment.com:9010/' + service;
            url += '/' + (selectedDbType === 'as400' ? 'db2' : selectedDbType);

            if (inMemory.is(':checked')) {
              url += ',virtual-columns,datastore';
            }

            var args = {
              'groupId'    : groupId.val(),
              'artifactId' : artifactId.val(),
              'version'    : version.val(),
              'packaging'  : 'jar'
            };

            if (enterprise) {
              args['speedmentEnterpriseVersion'] = '1.1.3';
              args['runtimeGroupId']    = 'com.speedment.enterprise';
              args['runtimeArtifactId'] = 'runtime';
              args['runtimeVersion']    = '${speedment.enterprise.version}';
              args['pluginGroupId']     = 'com.speedment.enterprise';
              args['pluginArtifactId']  = 'speedment-enterprise-maven-plugin';
              args['pluginVersion']     = '${speedment.enterprise.version}';
            } else {
              args['speedmentVersion']  = '3.0.6';
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
                 $('#preview' + page).html(
                   Prism.highlight(data, lang)
                 ).fadeIn(100);
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

            enterprise = inMemory.is(':checked')
                      || enterpriseDb;

            if (enterprise) {
              //$('#licenseApache2').hide();
              //$('#license30DaysTrial').show();
              $('#licenseKey').show();
            } else {
              //$('#licenseApache2').show();
              //$('#license30DaysTrial').hide();
              $('#licenseKey').hide();
            }

            if (enterpriseDb) {
              $('#helpDriverVersion').show();
            } else {
              $('#helpDriverVersion').hide();
            }
          }

          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            updateCode();
          });

          groupId.change(updateCode);
          artifactId.change(updateCode);
          version.change(updateCode);
          licenseKey.change(updateCode);
          driverVersion.change(updateCode);
          inMemory.change(function() {
            updateEnterprise();
            updateCode();
          });

          dbType.change(function() {
            if        (this.value === 'mysql') {
                driverVersion.val('5.1.40');
            } else if (this.value === 'postgresql') {
                driverVersion.val('9.4.1212.jre7');
            } else if (this.value === 'mariadb') {
                driverVersion.val('1.5.7');
            } else if (this.value == 'oracle') {
                driverVersion.val('12.1.0.1.0');
            } else if (this.value === 'db2') {
                driverVersion.val('4.21.29');
            } else if (this.value === 'as400') {
                driverVersion.val('9.1');
            } else if (this.value === 'mssql') {
                driverVersion.val('4.0');
            } else {
              console.error('Unknown database type "' + this.value + '".');
              return;
            }

            updateEnterprise();
            updateCode();
          });

          updateCode();

          $('#speedmentForm').submit(function(ev) {
            updateCode();
            ev.preventDefault();
          });
        });
      </script>

      <?php ///////////////////////////////////////////////////////////////// ?>
      <?php //                    Send me a trial                          // ?>
      <?php ///////////////////////////////////////////////////////////////// ?>

      <div id="trialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="trialModalHeader" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="trialModalHeader">30 Days Free Trial</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group row">
                  <label for="trial-firstname" class="col-sm-3 col-form-label">Firstname:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-firstname">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="trial-lastname" class="col-sm-3 col-form-label">Lastname:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-lastname">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="trial-company" class="col-sm-3 col-form-label">Company:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-company">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="trial-country" class="col-sm-3 col-form-label">Country:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-country">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="trial-state" class="col-sm-3 col-form-label">State:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-state">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="trial-email" class="col-sm-3 col-form-label">Email:</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="trial-email">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Send Me a Trial</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
