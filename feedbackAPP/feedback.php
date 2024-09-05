<?php require './header.php'; ?>

<?php
  $sql = 'SELECT * FROM feedback';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container d-flex flex-column align-items-center">
  <h2>Feedback</h2>

  <?php if (empty($feedback)) : ?>
    <p class="lead mt3  ">There is no Feedback!</p>
  <?php endif; ?>

  <?php foreach($feedback as $item): ?>
  <div class="card my-3">
    <div class="card-body text-center">
      "<?php echo $item['body']; ?>"
      <div class="text-secondary mt-2">
        By <?php echo $item['name']; ?>
      </div>
    </div>
  </div>
  <?php endforeach;?>

  <?php include './footer.php'; ?>