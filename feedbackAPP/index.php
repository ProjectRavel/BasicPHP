<?php require './header.php';  ?>

<?php
$name = $email = $body = '';
$nameErr = $emailErr = $bodyErr = '';

// Form Submit
if (isset($_POST['submit'])) {
  // Validate
  if (empty($_POST['name'])) {
    $nameErr = "Name is required";
  } else {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($_POST['email'])) {
    $emailErr = "Email is required";
  } else {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  }

  if (empty($_POST['body'])) {
    $bodyErr = "Feedback is required";
  } else {
    $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_SPECIAL_CHARS);
  }

  if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
    $date = date('Y-m-d');
    $sql = "INSERT INTO feedback (name, email, body, date) VALUES ('$name', '$email', '$body', '$date')";
    if ($conn->query($sql) === TRUE) {
      header('Location: feedback.php');
    } else {
      echo "Gagal: " . $sql . "<br>" . $connection->error;
    }
  } else {
    echo "Gagal";
  }
}

?>

<div class="container d-flex flex-column align-items-center">
  <img src="./img/logo.png" class="w-25 mb-3 " alt="" />
  <h2>Feedback</h2>
  <p class="lead text-center">Leave feedback for Traversy Media</p>

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-75" method="post">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input
        type="text"
        class="form-control <?php echo $nameErr ? 'is-invalid' : '' ?>"
        id="name"
        name="name"
        placeholder="Enter your name" />
      <div class="invalid-feedback">
        <?php echo $nameErr; ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input
        type="email"
        class="form-control <?php echo $nameErr ? 'is-invalid' : '' ?>"
        id="email"
        name="email"
        placeholder="Enter your email" />
      <div class="invalid-feedback">
        <?php echo $emailErr; ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="body" class="form-label">Feedback</label>
      <textarea
        class="form-control <?php echo $nameErr ? 'is-invalid' : '' ?>"
        id="body"
        name="body"
        placeholder="Enter your feedback"></textarea>
      <div class="invalid-feedback">
        <?php echo $bodyErr; ?>
      </div>
    </div>
    <div class="mb-3">
      <input
        type="submit"
        name="submit"
        value="Send"
        class="btn btn-dark w-100" />
    </div>

  </form>

</div>

<?php include './footer.php'; ?>