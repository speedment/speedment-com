<?php
/*
 * Template Name: Trial Page
 * Description: Page template that shows a trial license configurator form
 */

get_header(); ?>
<!-- Start Page Content -->

<div class="justify-content-center" id="trial">
  <div class="container">
    <!--
        Products Page Content
    -->
    <div class="row justify-content-center config-column">
      <div class="col">
        <form method="post" action="#">

          <!-- Project Info -->
          <div class="form-group row">
            <label for="inputGroupId" class="col-sm-2 col-form-label">GroupId</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputGroupId" placeholder="GroupId" value="com.example">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputArtifactId" class="col-sm-2 col-form-label">ArtifactId</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputArtifactId" placeholder="ArtifactId" value="demo">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputVersion" class="col-sm-2 col-form-label">Version</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputVersion" placeholder="Version" value="1.0.0-SNAPSHOT">
            </div>
          </div>

          <!-- Select Database Type -->
          <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-2">Database Type</legend>
            <div class="col-sm-10">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType1" value="mysql" checked>
                  MySQL
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType2" value="postgresql" checked>
                  PostgreSQL
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType3" value="mariadb" checked>
                  MariaDB
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType4" value="oracle" checked>
                  Oracle
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType5" value="db2" checked>
                  DB2
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType6" value="as400" checked>
                  AS400
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="radioDatabaseType" id="radioDatabaseType7" value="mssql" checked>
                  SQL Server
                </label>
              </div>
            </div>
          </fieldset>

          <!-- Select Driver Version -->
          <div class="form-group row">
            <label for="inputDriverVersion" class="col-sm-2 col-form-label">Driver Version</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDriverVersion" placeholder="Database Driver Version" value="5.1.40">
              <small id="helpDriverVersion" class="text-muted">
                Must be available on your development machine.
              </small>
            </div>
          </div>

          <!-- Email Address -->
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Send me the code to</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail" placeholder="Your Email Address" value="">
            </div>
            <button type="submit" class="btn btn-primary">Generate Project</button>
          </div>

          <div class="form-group row" id="licenseApache2">
            License - <a href="https://www.apache.org/licenses/LICENSE-2.0.html" rel="The Apache 2 License" target="_blank">Apache 2</a>
          </div>

          <div class="form-group row" id="license30DaysTrial" style="display:none">
            License - <a href="/terms" rel="Terms of Service" target="_blank">30 Days Free Trial</a>
          </div>
        </form>
      </div>
    </div>

    <!--
        Products Widget Area
    -->
    <div class="row justify-content-center row-eq-height preview-column">
      <div class="col">
        <pre><code class="language-java">
public static void main(String... args) {
  System.out.println("Hello, World!");
}
        </code></pre>
      </div>
    </div>
  </div>
</div>

<!-- End Page Content -->
<?php get_footer(); ?>
