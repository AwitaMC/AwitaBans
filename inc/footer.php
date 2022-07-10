<?php
$commitHash = exec('git log --pretty="%h" -n1 HEAD') ?: "unknown";
?>

<footer>
    <div class="container">
        <div class="acrylic acrylic-radius">
            <p><a href="https://github.com/AwitaMC/AwitaBans" target="_blank">AwitaBans</a> - commit <code><?= $commitHash ?></code></p>
            <p>Un proyecto basado en <a href="https://gitlab.com/ruany/litebans-php" target="_blank">litebans-php</a> de Ruan</p>
        </div>
    </div>
</footer>
<script src="<?= $this->resource('inc/js/jquery-3.6.0.min.js') ?>"></script>
<script src="<?= $this->resource('inc/js/bootstrap.min.js') ?>"></script>
<?= "</html>" ?>
