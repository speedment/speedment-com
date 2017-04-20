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
              <label class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" name="inMemory" id="inputInMemoryTrue" value="true">
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

          <!-- Email Address -->
          <div class="form-group row" id="licenseKey" style="display:none;">
            <div style="overflow:hidden;position:relative;width:100%;height:100px;top:-10px;margin-bottom:-100px;margin-right:-100px;right:-2px;z-index:1;pointer-events:none;">
              <div class="cr cr-top cr-right cr-blue">Enterprise</div>
            </div>
            <label for="inputLicenseKey" class="col-sm-3 col-form-label">Enterprise License Key</label>
            <div class="col-sm-9 row rightSide">
              <textarea class="form-control col-12" id="inputLicenseKey" placeholder="Enter Your Enterprise License Key Here"><?php
                if (isset($_GET['licenseKey'])) {
                  echo $_GET['licenseKey'];
                }
              ?></textarea>
              <a role="button" href="<?php echo get_permalink(12); ?>" class="col-6 btn" rel="Contact Sales">Contact Sales</a>
              <div class="separator"></div>
              <button type="button" class="col-6 btn btn-primary" rel="Send me a trial" data-toggle="modal" data-target="#trialModal">Send me a 30 Days Trial</button>
              <small class="text-muted nosize"><i class="fa fa-asterisk" aria-hidden="true"></i> Enterprise Features require a valid License Key.</small>
            </div>
          </div>

          <!-- Submit -->
          <div class="form-group row pull-right" id="submitGroup">
            <div class="col submit-group">
              <button type="submit" class="btn btn-primary">Generate Project</button>
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

            if ($('input[type=radio][name=inMemory]:checked').val()) {
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

            enterprise = $('input[type=radio][name=inMemory]:checked').val()
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

          updateEnterprise();
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

      <div id="trialModal" class="modal fade align-middle" tabindex="-1" role="dialog" aria-labelledby="trialModalHeader" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="trialModalForm" action="#">
              <div class="modal-header">
                <h5 class="modal-title" id="trialModalHeader">Get a 30 Days Free Trial of Speedment Enterprise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <label for="trial-firstname" class="col-sm-3 col-form-label">Firstname:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-firstname" required="required">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="trial-lastname" class="col-sm-3 col-form-label">Lastname:</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="trial-lastname" required="required">
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
                    <select name="country" class="form-control" id="trial-country" required="required">
                      <option value="AF">Afghanistan</option>
                      <option value="AX">Åland Islands</option>
                      <option value="AL">Albania</option>
                      <option value="DZ">Algeria</option>
                      <option value="AS">American Samoa</option>
                      <option value="AD">Andorra</option>
                      <option value="AO">Angola</option>
                      <option value="AI">Anguilla</option>
                      <option value="AQ">Antarctica</option>
                      <option value="AG">Antigua and Barbuda</option>
                      <option value="AR">Argentina</option>
                      <option value="AM">Armenia</option>
                      <option value="AW">Aruba</option>
                      <option value="AU">Australia</option>
                      <option value="AT">Austria</option>
                      <option value="AZ">Azerbaijan</option>
                      <option value="BS">Bahamas</option>
                      <option value="BH">Bahrain</option>
                      <option value="BD">Bangladesh</option>
                      <option value="BB">Barbados</option>
                      <option value="BY">Belarus</option>
                      <option value="BE">Belgium</option>
                      <option value="BZ">Belize</option>
                      <option value="BJ">Benin</option>
                      <option value="BM">Bermuda</option>
                      <option value="BT">Bhutan</option>
                      <option value="BO">Bolivia, Plurinational State of</option>
                      <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                      <option value="BA">Bosnia and Herzegovina</option>
                      <option value="BW">Botswana</option>
                      <option value="BV">Bouvet Island</option>
                      <option value="BR">Brazil</option>
                      <option value="IO">British Indian Ocean Territory</option>
                      <option value="BN">Brunei Darussalam</option>
                      <option value="BG">Bulgaria</option>
                      <option value="BF">Burkina Faso</option>
                      <option value="BI">Burundi</option>
                      <option value="KH">Cambodia</option>
                      <option value="CM">Cameroon</option>
                      <option value="CA">Canada</option>
                      <option value="CV">Cape Verde</option>
                      <option value="KY">Cayman Islands</option>
                      <option value="CF">Central African Republic</option>
                      <option value="TD">Chad</option>
                      <option value="CL">Chile</option>
                      <option value="CN">China</option>
                      <option value="CX">Christmas Island</option>
                      <option value="CC">Cocos (Keeling) Islands</option>
                      <option value="CO">Colombia</option>
                      <option value="KM">Comoros</option>
                      <option value="CG">Congo</option>
                      <option value="CD">Congo, the Democratic Republic of the</option>
                      <option value="CK">Cook Islands</option>
                      <option value="CR">Costa Rica</option>
                      <option value="CI">Côte d'Ivoire</option>
                      <option value="HR">Croatia</option>
                      <option value="CU">Cuba</option>
                      <option value="CW">Curaçao</option>
                      <option value="CY">Cyprus</option>
                      <option value="CZ">Czech Republic</option>
                      <option value="DK">Denmark</option>
                      <option value="DJ">Djibouti</option>
                      <option value="DM">Dominica</option>
                      <option value="DO">Dominican Republic</option>
                      <option value="EC">Ecuador</option>
                      <option value="EG">Egypt</option>
                      <option value="SV">El Salvador</option>
                      <option value="GQ">Equatorial Guinea</option>
                      <option value="ER">Eritrea</option>
                      <option value="EE">Estonia</option>
                      <option value="ET">Ethiopia</option>
                      <option value="FK">Falkland Islands (Malvinas)</option>
                      <option value="FO">Faroe Islands</option>
                      <option value="FJ">Fiji</option>
                      <option value="FI">Finland</option>
                      <option value="FR">France</option>
                      <option value="GF">French Guiana</option>
                      <option value="PF">French Polynesia</option>
                      <option value="TF">French Southern Territories</option>
                      <option value="GA">Gabon</option>
                      <option value="GM">Gambia</option>
                      <option value="GE">Georgia</option>
                      <option value="DE">Germany</option>
                      <option value="GH">Ghana</option>
                      <option value="GI">Gibraltar</option>
                      <option value="GR">Greece</option>
                      <option value="GL">Greenland</option>
                      <option value="GD">Grenada</option>
                      <option value="GP">Guadeloupe</option>
                      <option value="GU">Guam</option>
                      <option value="GT">Guatemala</option>
                      <option value="GG">Guernsey</option>
                      <option value="GN">Guinea</option>
                      <option value="GW">Guinea-Bissau</option>
                      <option value="GY">Guyana</option>
                      <option value="HT">Haiti</option>
                      <option value="HM">Heard Island and McDonald Islands</option>
                      <option value="VA">Holy See (Vatican City State)</option>
                      <option value="HN">Honduras</option>
                      <option value="HK">Hong Kong</option>
                      <option value="HU">Hungary</option>
                      <option value="IS">Iceland</option>
                      <option value="IN">India</option>
                      <option value="ID">Indonesia</option>
                      <option value="IR">Iran, Islamic Republic of</option>
                      <option value="IQ">Iraq</option>
                      <option value="IE">Ireland</option>
                      <option value="IM">Isle of Man</option>
                      <option value="IL">Israel</option>
                      <option value="IT">Italy</option>
                      <option value="JM">Jamaica</option>
                      <option value="JP">Japan</option>
                      <option value="JE">Jersey</option>
                      <option value="JO">Jordan</option>
                      <option value="KZ">Kazakhstan</option>
                      <option value="KE">Kenya</option>
                      <option value="KI">Kiribati</option>
                      <option value="KP">Korea, Democratic People's Republic of</option>
                      <option value="KR">Korea, Republic of</option>
                      <option value="KW">Kuwait</option>
                      <option value="KG">Kyrgyzstan</option>
                      <option value="LA">Lao People's Democratic Republic</option>
                      <option value="LV">Latvia</option>
                      <option value="LB">Lebanon</option>
                      <option value="LS">Lesotho</option>
                      <option value="LR">Liberia</option>
                      <option value="LY">Libya</option>
                      <option value="LI">Liechtenstein</option>
                      <option value="LT">Lithuania</option>
                      <option value="LU">Luxembourg</option>
                      <option value="MO">Macao</option>
                      <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                      <option value="MG">Madagascar</option>
                      <option value="MW">Malawi</option>
                      <option value="MY">Malaysia</option>
                      <option value="MV">Maldives</option>
                      <option value="ML">Mali</option>
                      <option value="MT">Malta</option>
                      <option value="MH">Marshall Islands</option>
                      <option value="MQ">Martinique</option>
                      <option value="MR">Mauritania</option>
                      <option value="MU">Mauritius</option>
                      <option value="YT">Mayotte</option>
                      <option value="MX">Mexico</option>
                      <option value="FM">Micronesia, Federated States of</option>
                      <option value="MD">Moldova, Republic of</option>
                      <option value="MC">Monaco</option>
                      <option value="MN">Mongolia</option>
                      <option value="ME">Montenegro</option>
                      <option value="MS">Montserrat</option>
                      <option value="MA">Morocco</option>
                      <option value="MZ">Mozambique</option>
                      <option value="MM">Myanmar</option>
                      <option value="NA">Namibia</option>
                      <option value="NR">Nauru</option>
                      <option value="NP">Nepal</option>
                      <option value="NL">Netherlands</option>
                      <option value="NC">New Caledonia</option>
                      <option value="NZ">New Zealand</option>
                      <option value="NI">Nicaragua</option>
                      <option value="NE">Niger</option>
                      <option value="NG">Nigeria</option>
                      <option value="NU">Niue</option>
                      <option value="NF">Norfolk Island</option>
                      <option value="MP">Northern Mariana Islands</option>
                      <option value="NO">Norway</option>
                      <option value="OM">Oman</option>
                      <option value="PK">Pakistan</option>
                      <option value="PW">Palau</option>
                      <option value="PS">Palestinian Territory, Occupied</option>
                      <option value="PA">Panama</option>
                      <option value="PG">Papua New Guinea</option>
                      <option value="PY">Paraguay</option>
                      <option value="PE">Peru</option>
                      <option value="PH">Philippines</option>
                      <option value="PN">Pitcairn</option>
                      <option value="PL">Poland</option>
                      <option value="PT">Portugal</option>
                      <option value="PR">Puerto Rico</option>
                      <option value="QA">Qatar</option>
                      <option value="RE">Réunion</option>
                      <option value="RO">Romania</option>
                      <option value="RU">Russian Federation</option>
                      <option value="RW">Rwanda</option>
                      <option value="BL">Saint Barthélemy</option>
                      <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                      <option value="KN">Saint Kitts and Nevis</option>
                      <option value="LC">Saint Lucia</option>
                      <option value="MF">Saint Martin (French part)</option>
                      <option value="PM">Saint Pierre and Miquelon</option>
                      <option value="VC">Saint Vincent and the Grenadines</option>
                      <option value="WS">Samoa</option>
                      <option value="SM">San Marino</option>
                      <option value="ST">Sao Tome and Principe</option>
                      <option value="SA">Saudi Arabia</option>
                      <option value="SN">Senegal</option>
                      <option value="RS">Serbia</option>
                      <option value="SC">Seychelles</option>
                      <option value="SL">Sierra Leone</option>
                      <option value="SG">Singapore</option>
                      <option value="SX">Sint Maarten (Dutch part)</option>
                      <option value="SK">Slovakia</option>
                      <option value="SI">Slovenia</option>
                      <option value="SB">Solomon Islands</option>
                      <option value="SO">Somalia</option>
                      <option value="ZA">South Africa</option>
                      <option value="GS">South Georgia and the South Sandwich Islands</option>
                      <option value="SS">South Sudan</option>
                      <option value="ES">Spain</option>
                      <option value="LK">Sri Lanka</option>
                      <option value="SD">Sudan</option>
                      <option value="SR">Suriname</option>
                      <option value="SJ">Svalbard and Jan Mayen</option>
                      <option value="SZ">Swaziland</option>
                      <option value="SE">Sweden</option>
                      <option value="CH">Switzerland</option>
                      <option value="SY">Syrian Arab Republic</option>
                      <option value="TW">Taiwan, Province of China</option>
                      <option value="TJ">Tajikistan</option>
                      <option value="TZ">Tanzania, United Republic of</option>
                      <option value="TH">Thailand</option>
                      <option value="TL">Timor-Leste</option>
                      <option value="TG">Togo</option>
                      <option value="TK">Tokelau</option>
                      <option value="TO">Tonga</option>
                      <option value="TT">Trinidad and Tobago</option>
                      <option value="TN">Tunisia</option>
                      <option value="TR">Turkey</option>
                      <option value="TM">Turkmenistan</option>
                      <option value="TC">Turks and Caicos Islands</option>
                      <option value="TV">Tuvalu</option>
                      <option value="UG">Uganda</option>
                      <option value="UA">Ukraine</option>
                      <option value="AE">United Arab Emirates</option>
                      <option value="GB">United Kingdom</option>
                      <option selected="selected" value="US">United States</option>
                      <option value="UM">United States Minor Outlying Islands</option>
                      <option value="UY">Uruguay</option>
                      <option value="UZ">Uzbekistan</option>
                      <option value="VU">Vanuatu</option>
                      <option value="VE">Venezuela, Bolivarian Republic of</option>
                      <option value="VN">Viet Nam</option>
                      <option value="VG">Virgin Islands, British</option>
                      <option value="VI">Virgin Islands, U.S.</option>
                      <option value="WF">Wallis and Futuna</option>
                      <option value="EH">Western Sahara</option>
                      <option value="YE">Yemen</option>
                      <option value="ZM">Zambia</option>
                      <option value="ZW">Zimbabwe</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row" id="stateRow">
                  <label for="trial-state" class="col-sm-3 col-form-label">State:</label>
                  <div class="col-sm-9">
                    <select name="state" class="form-control" id="trial-state">
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option selected="selected" value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                </div>
                <script>
                  jQuery(document).ready(function($) {
                    $('select[name="country"]').change(function() {
                      var country = $(this).val();
                      if ('US' === country) {
                          $('#stateRow').show();
                      } else {
                          $('#stateRow').hide();
                      }
                    });
                  });
                </script>
                <div class="form-group row">
                  <label for="trial-email" class="col-sm-3 col-form-label">Email:</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="trial-email" required="required">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <small class="text-muted">By continuing you agree to the <a href="/terms" rel="Terms of Service" target="_blank">Terms of Service</a>.</small>
                <button type="submit" class="btn btn-primary" id="trialModalSubmit">Send me a 30 Days Trial</button>
                <script>
                  jQuery(document).ready(function($) {
                    console.log('Preparing form with $ as ' + $);
                    $('#trialModalForm').submit(function(ev) {
                      console.log('Submitting form');

                      var popup = $('#popupModal');
                      var email = $('#trial-email').val();

                      $('#trialModalSubmit').disable(true);

                      $.ajax({
                         url: 'http://api.speedment.com:9010/licenses/trial/datastore,virtual-columns,mssql,mysql,oracle,db2' +
                          '?firstname=' + encodeURIComponent($('#trial-firstname').val()) +
                          '&lastname=' + encodeURIComponent($('#trial-lastname').val()) +
                          '&email=' + encodeURIComponent(email) +
                          '&company=' + encodeURIComponent($('#trial-company').val()) +
                          '&country=' + encodeURIComponent($('#trial-country').val()) +
                          '&state=' + encodeURIComponent($('#trial-state').val()),
                         type: "POST",
                         crossDomain: true,
                         success: function (data) {
                           console.log(data);
                           $('#trialModal').modal('hide');
                           $('#trialModalSubmit').disable(false);
                           $('#popupModal .modal-title').html('Success!');
                           $('#popupModal .modal-body').html(
                             'A Speedment Enterprise Trial has been sent to ' + email +
                             '. In the email, you will find the code that you ' +
                             'need to enter on this page to get access to the ' +
                             'Enterprise features.'
                           );
                           $('#popupModal').modal('show');
                         },
                         error: function (xhr, status) {
                           $('#trialModalSubmit').disable(false);
                           console.error(xhr);
                           console.error('Error! Server responded with ' + status + '.');

                           $('#popupModal .modal-title').html('Error!');
                           $('#popupModal .modal-body').html(
                             'Server responded with ' + status +
                             '. Make sure everything is filled out correctly, ' +
                             'then try again. If the problem persists, please ' +
                             'contact us directly at <a href="mailto:info@speedment.com">info@speedment.com</a>.'
                           );
                           $('#popupModal').modal('show');
                         }
                     });

                     ev.preventDefault();
                    });
                  });
                </script>
              </div>
            </form>
          </div>
        </div>
      </div><!-- Modal Close -->

      <div id="popupModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="popupTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Success!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Message here
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
