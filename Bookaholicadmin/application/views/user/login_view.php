<?php if ($this->session->userdata('logged_in')): ?>


    <?php echo form_open('auth/logout'); ?>

    <p>
        <?php if ($this->session->userdata('username')):
            echo "You are logged in as " . $this->session->userdata('username');
        endif; ?>
    </p>

    <?php $data = array(
        'class' => 'btn btn-primary',
        'name' => 'submit',
        'value' => 'Logout'
    );

    echo form_submit($data);

    echo form_close();
else:
    ?>

    <h2>Login</h2>

    <?php $attributes = array('id' => 'login_form', 'class' => 'form_horizontal'); ?>

    <?php
    if ($this->session->flashdata('errors')):
        echo $this->session->flashdata('errors');
    endif;
    ?>

    <?php echo form_open('auth/login', $attributes); ?>

    <div class="form-group">

        <?php echo form_label('Username'); ?>

        <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'username',
            'placeholder' => 'Enter Username'
        );
        ?>
        <?php echo form_input($data); ?>

    </div>

    <div class="form-group">

        <?php echo form_label('Password'); ?>

        <?php
        $data = array(
            'class' => 'form-control',
            'name' => 'password',
            'placeholder' => 'Enter Password'
        );
        ?>
        <?php echo form_password($data); ?>

    </div>

    <div class="form-group">

        <?php
        $data = array(
            'class' => 'btn btn-primary',
            'name' => 'submit',
            'value' => 'Login'
        );
        ?>
        <?php echo form_submit($data); ?>

    </div>

    <?php echo form_close(); ?>
<?php endif; ?>