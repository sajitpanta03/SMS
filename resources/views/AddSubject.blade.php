@extends('Layouts.main')

<div class="container d-flex justify-content-center">
    <form class="mt-4 col-6 shadow pt-4" action="/add" method="post" >
        @csrf
        <input type="hidden" name="id" value="">
        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Subject Name" value="">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="full_mark" id="full_mark" aria-describedby="emailHelpId" placeholder="Full Mark" value="" >
        </div>
        <div class="form-group">
            <input type="number" class="form-control" name="pass_mark" id="pass_mark" placeholder="Pass Mark" value="" >
        </div>
        <button type="submit" name="submit" class="btn btn-primary" style="position: relative; left: 50%;">Add</button>
    </form>
</div>
