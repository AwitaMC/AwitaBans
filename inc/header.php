<?php

class Header {
/**
 * @param $page Page
 */
function __construct($page) {
    $this->page = $page;
}

function navbar($links) {
    echo '<ul class="navbar-nav mr-auto">';
    $request = $this->page->get_requested_page();
    foreach ($links as $page => $title) {
        $li = "li";
        $class = "nav-item";
        if ($this->page->settings->simple_urls) {
            if ("$request.php" === $page) {
                $class .= " active navbar-active";
            }
        } else if ((substr($_SERVER['SCRIPT_NAME'], -strlen($page))) === $page) {
            $class .= " active navbar-active";
        }
        $li .= " class=\"$class\"";

        if ($this->page->settings->header_show_totals && isset($this->count[$page])) {
            $title .= ' <span class="' . $this->page->settings->badge_classes . ' acrylic">';
            $title .= $this->count[$page];
            $title .= "</span>";
        }
        $page = $this->page->link($page);
        echo "<$li><a class=\"nav-link\" href=\"$page\">$title</a></li>";
    }
    echo '</ul>';
}

function print_header() {
$page = $this->page;
$settings = $page->settings;

if ($page->settings->name_link === "index.php") {
    $page->settings->name_link = $page->link("index.php");
}
if ($page->settings->header_show_totals) {
    $t = $page->settings->table;
    $t_bans = $t['bans'];
    $t_mutes = $t['mutes'];
    $t_warnings = $t['warnings'];
    $t_kicks = $t['kicks'];
    $active_query = $page->db->active_query;
    try {
        $sql = "SELECT
            (SELECT COUNT(*) FROM $t_bans $active_query),
            (SELECT COUNT(*) FROM $t_mutes $active_query),
            (SELECT COUNT(*) FROM $t_warnings $active_query),
            (SELECT COUNT(*) FROM $t_kicks $active_query)";

        if ($page->db->verify) {
            $sql .= ",(SELECT id FROM " . $t['config'] . " LIMIT 1)";
        }
        $st = $page->conn->query($sql);

        ($row = $st->fetch(PDO::FETCH_NUM)) or die('Failed to fetch row counts.');
        $st->closeCursor();
        $this->count = array(
            'bans.php'     => $row[0],
            'mutes.php'    => $row[1],
            'warnings.php' => $row[2],
            'kicks.php'    => $row[3],
        );
    } catch (PDOException $ex) {
        $page->db->handle_error($page->settings, $ex);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Información para buscadores -->
    <meta name="description" content="¡Revisa todo el historial de sanciones del servidor!">
    <meta name="theme-color" content="#2260bb">
    <meta name="og:site_name" content="Sanciones de AwitaMC">
    <meta name="og:title" content="Sanciones de AwitaMC">
    <meta name="og:description" content="¡Revisa todo el historial de sanciones del servidor!">
    <meta name="og:type" content="website">
    <meta name="og:image" content="https://static.5sm.online/46bbdc8a0b253ddfbef4d5ab44dfa7fe.png">
    <link href="<?php echo $this->page->resource('inc/img/favicon.ico'); ?>" rel="shortcut icon">
    <!-- CSS -->
    <link href="<?php echo $this->page->resource('inc/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->page->resource('inc/css/glyphicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo $this->page->resource('inc/css/custom.css'); ?>" rel="stylesheet">
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;800;900&display=swap" rel="stylesheet">

    <script type="text/javascript">
        function withjQuery(tries, f) {
            if (window.jQuery) f();
            else if (tries > 0) window.setTimeout(function () {
                withjQuery(tries - 1, f);
            }, 100);
        }
    </script>
</head>


<header role="banner">
    <div class="navbar navbar-expand-lg fixed-top <?php echo $settings->navbar_classes; ?> acrylic">
        <div class="container">
            <a class="navbar-brand" href="<?php echo $settings->name_link; ?>">
                <?php echo $settings->name; ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#litebans-navbar"
                    aria-controls="litebans-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="litebans-navbar">
                <?php
                $this->navbar(array(
                    "index.php"    => $this->page->t("title.index"),
                    "bans.php"     => $this->page->t("title.bans"),
                    "mutes.php"    => $this->page->t("title.mutes"),
                    "warnings.php" => $this->page->t("title.warnings"),
                    "kicks.php"    => $this->page->t("title.kicks"),
                    "search.php"   => $this->page->t("title.search"),
                ));
                ?>
            </div>
        </div>
</header>

<?php
if ($page->lang->version <= 1) {
    ?>
    <div class="col-lg-6 container modal-header alert alert-dismissible alert-light">
        <button type="button" class="close text-dark" data-dismiss="alert">×</button>
        <h5 class="text-dark">Warning: Your language file <a class="alert-link">(lang/<?php echo $settings->lang; ?>.php)</a> is outdated. Some messages will not appear correctly.</h5>
    </div>
    <?php
}
}
}
?>
