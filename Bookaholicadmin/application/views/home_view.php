<p class="bg-success">
    <?php if ($this->session->flashdata('login_success')):
    echo $this->session->flashdata('login_success');
    endif;
    ?>

    <?php
        if ($this->session->flashdata('user_registered')):
        echo $this->session->flashdata('user_registered');
        endif;
    ?>

</p>
<p class="bg-danger">
    <?php if ($this->session->flashdata('login_failed')):
        echo $this->session->flashdata('login_failed');
    endif;
    ?>

    <?php
    if ($this->session->flashdata('no_access')):
        echo $this->session->flashdata('no_access');
    endif;
    ?>

</p>

<h1>Welcome to Bookaholic</h1>