<!DOCTYPE html>
<html lang="en">
<head>
    @include('master/header')
    <title>News</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <h2>Edit User</h2>
            <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="Name">Title</label>
                <input type="text" class="form-control" name="name" id="" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="Name">Title</label>
                <input type="email" class="form-control" name="email" id="" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="Name">Title</label>
                <input type="text" class="form-control" name="password" id="" value="{{ $user->password }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
