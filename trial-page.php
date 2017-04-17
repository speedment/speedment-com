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
      <div class="col-6 config-column">
        <form method="post" action="#">

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
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType1" value="mysql" checked>
                  MySQL
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType2" value="postgresql" checked>
                  PostgreSQL
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType3" value="mariadb" checked>
                  MariaDB
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType4" value="oracle" checked>
                  Oracle
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType5" value="db2" checked>
                  DB2
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType6" value="as400" checked>
                  AS400
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType7" value="mssql" checked>
                  SQL Server
                </label>
              </div>
            </div>
          </div>

          <!-- Select Driver Version -->
          <div class="form-group row">
            <label for="inputDriverVersion" class="col-sm-3 col-form-label">Driver Version</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="inputDriverVersion" placeholder="Database Driver Version" value="5.1.40">
              <small id="helpDriverVersion" class="text-muted">
                Must be available on your development machine.
              </small>
            </div>
          </div>

          <!-- Email Address -->
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-3 col-form-label">Send it to</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="inputEmail" placeholder="Your Email Address" value="">
            </div>
          </div>

          <!-- Submit -->
          <div class="form-group row pull-right">
            <div class="col submit-group">
              <button type="submit" class="btn btn-primary">Generate Project</button>
              <small class="text-muted" id="licenseApache2">License <a href="https://www.apache.org/licenses/LICENSE-2.0.html" rel="The Apache 2 License" target="_blank">Apache 2</a></small>
              <small class="text-muted" id="license30DaysTrial" style="display:none">License <a href="/terms" rel="Terms of Service" target="_blank">30 Days Free Trial</a></small>
            </div>
          </div>
        </form>
      </div>

      <div class="col preview-column">
        <pre><code class="language-java">public static void main(String... args) {
  System.out.println("Hello, World!");
}</code></pre>
      </div>
    </div>
  </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
