<?php include 'filesLogic.php';?>
<html>
<head>
  <title>Hall Ticket Download</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
</head>
<body>
  <div class="container">
    <div class="sub-container">
      <Center>
        <h2 class="heading">Hall Ticket Download</h2>
      </Center>
      <p class="note"><span class="red"></span> Hall tickets are required for you to enter in the examination hall and give the exams. It is a MUST carry thing for you during exams </p><br>
      <div class="hall-ticket-found">
        <p class="ticket-info"> Here's the Hall ticket for your exam. Click the button below to download it. The <b>PDF of hall ticket</b> will be sent to you on your <b>registered email id</b>.
          <br><br>Best of Luck for your Exams!!
        </p>
        <h2>Department Announcements</h2>
        <table>
        <thead>
            <th>ID</th>
            <th>Filename</th>
            <th>size (in mb)</th>
            <th>Downloads</th>
            <th>Action</th>
        </thead>
        <tbody>
          <?php foreach ($files as $file): ?>
            <tr>
              <td><?php echo $file['id']; ?></td>
              <td><?php echo $file['name']; ?></td>
              <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
              <td><?php echo $file['downloads']; ?></td>
              <td><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
            </tr>
          <?php endforeach;?>
        
        </tbody>
        </table>
          </div>
          </div>
      </div>
      <div class="ticket-not-found">
        <p class="ticket-info-nf">
          Ticket not available right now.<br>Make sure that
          <ul class="make-sure">
            <li>You visited website during examination period. </li>
            <li>Your faculty has uploaded your hall ticket. </li>
        </ul>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
