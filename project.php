

<?php include_once 'pages/function.php'; ?>

<?php writehead("fabianr.de - work"); ?>

<body>

    <main>
        <div id="page-content">
            <div class="grid-block">
            <?php
                if(isset($_GET["id"]))
                    viewernew($_GET["id"]);
                else
                    echo "";
                ?>
            </div>
        </div>
    </main>

    <!-- INCLUDE FOOTER -->
    <?php footer(); ?> 
</body>
