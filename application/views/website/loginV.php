 <div class="formular_login">
     <form action="login.php" method="POST">
        <p>
          <label for="email">Email</label>
          <input type="text" name="email" id="email" />
        </p>
        <p>
          <label for="parola">Password</label>
          <input type="password" name="parola" id="parola" />
        </p>
        <p>
          <input type="submit" value="Login" class="shift" />
          <input type="hidden" name="login" value="true" />
        </p>
      </form>
      
      <div class="error">
	      <?php if(isset($errors)){	?>
		      
		       <p><?php print_r($errors);?></p>  
		      
	      <?php }	?>
	      
   
      </div>

      <p class="message">No account? You can register at <a href="register.php">here</a></p>
</div>

