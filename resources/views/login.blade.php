{{-- @extends('Layouts.main')

@section('content') --}}
    
<div class="col-4 shadow pb-3 mt-5 pt-3" style="background-color: #999; border-radius: 0.5rem;">
    <form action="\login" method="post">
        @csrf
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                placeholder="Email" value=">

            <?php if (isset($_SESSION['login_errors']['email'])) { ?>
            <small id="helpId" class="form-text text-danger"><?php echo $_SESSION['login_errors']['email']; ?></small>
            <?php } ?>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">

            <?php if (isset($_SESSION['login_errors']['password'])) { ?>
            <small id="helpId" class="form-text text-danger"><?php echo $_SESSION['login_errors']['password']; ?></small>
            <?php } ?>
        </div>
        <button type="submit" class="btn btn-primary col-12">Submit</button>
    </form>
</div>

{{-- @endsection --}}