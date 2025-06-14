<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Vaccines Master</title>

    <?php if (!empty($css_files) && is_array($css_files)): ?>
        <?php foreach ($css_files as $file): ?>
            <link rel="stylesheet" href="<?= $file ?>" />
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <div style="padding: 20px;">
        <?= $output ?>
    </div>

    <?php if (!empty($js_files) && is_array($js_files)): ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?= $file ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
