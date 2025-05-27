<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Nieuw contactbericht</title>
</head>
<body>
  <h1>Nieuw contactbericht ontvangen</h1>

  <p><strong>Naam:</strong> <?php echo e($data->name); ?></p>
  <p><strong>E-mail:</strong> <?php echo e($data->email); ?></p>
  <p><strong>Onderwerp:</strong> <?php echo e($data->subject); ?></p>
  <p><strong>Bericht:</strong></p>
  <p><?php echo e($data->message); ?></p>
</body>
</html>
<?php /**PATH /var/www/italiaansrestaurant/resources/views/emails/contact-form.blade.php ENDPATH**/ ?>