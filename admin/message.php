<?php include('header.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbarAdmin.php'); 
	
	?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-body">
						<!--/stories-->
						<div class="row">
							<br>

							<div class="col-md-6 col-sm-3 text-center">
								<form method="post" id="send_message" action="send_message.php">
								
									<div class="control-group">
										<label>To:</label>
										<div class="controls">
											<select name="friend_id" id = "friend_id" class="combo" required>
												<option value="-1">all</option>
												<?php
												$query = $conn->query("select members.member_id , members.firstname , members.lastname  from members where members.role != 'admin'");
												while ($row = $query->fetch()) {
													$friend_name = $row['firstname'] . " " . $row['lastname'];
													$id = $row['member_id'];
												?>
													<option value="<?php echo $id; ?>"><?php echo $friend_name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label>Your message:</label>
										<div class="controls">
											<textarea id = "my_message" name="my_message" class="my_message" required></textarea>
										</div>
									</div>
									<hr>
									<div class="control-group">
										<div class="controls">
											<button id = "sendMessage" class="btn btn-success"><i class="icon-envelope-alt"></i> Send </button>

										</div>
									</div>
								</form>

							</div>
							<div class="col-md-6 col-sm-9">
								Inbox
								<hr>
								<?php
								$query = $conn->query("select * from message
				LEFT JOIN members on message.sender_id = members.member_id where reciever_id = '$session_id' ");
								while ($row = $query->fetch()) {
									$id = $row['message_id'];

								?>
									<div class="mes">
										<div class="message"><?php echo $row['content']; ?>
											<hr>
											<div class="pull-left"><?php echo $row['date_sended']; ?></div>
											<div class="pull-right">Sent by: <?php echo $row['firstname'] . " " . $row['lastname']; ?></div>

											<hr>
											<br>
											<a href="delete_message.php<?php echo '?id=' . $id; ?>" class="btn btn-danger"><i class="icon-remove"></i> Remove</a>
										</div>
									</div>
								<?php } ?>
							</div>

						</div>
						<hr>
					</div>
				</div>



			</div>
			<!--/col-12-->
		</div>
	</div>


	<?php include('footer.php'); ?>

</body>

</html>