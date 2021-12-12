@extends('admin.base-layout')
@section('header')
    @include('admin.navbarAdmin')
@endsection
@section('main')
<div class="container">
    <div class="row">
        <div class="col-sm-11"><h2>List Request Withdraw</h2></div>
    </div>
  <div class="table-responsive">
  <table class="table table-striped">
    <thead style="background-color:#E8D0B3;">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Saldo</th>
        <th>Jumlah Withdraw</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $ctr=1; ?>
        @foreach ($wd as $i )
            <tr>
                <td>{{$ctr}}</td>
                <td>
                    @foreach ($user as $o=>$y )
                        @if ($y->id == $i->user_id)
                        {{$y->user_email}} || ID:{{$y->id}}
                        @endif
                    @endforeach
                </td>
                <th>
                    @foreach ($user as $y )
                        @if ($y->id == $i->user_id)
                        Rp.{{$y->user_saldo}},-
                        @endif
                    @endforeach
                </th>
                <td>Rp.{{$i->htranstpwd_total}},-</td>
                <td>
                <form action="">
                    <button type="submit" style="border-radius:3px;border:1px solid black; background-color:#FACE7F;">
                        <a href="#" style="text-decoration: :none; color:white;">
                            Accept
                        </a>
                    </button>
                </form>
                <form action="">
                    <button type="submit" style="border-radius:3px;border:1px solid black; background-color:red;">
                        <a href="#" style="text-decoration: :none; color:white;">
                            Decline
                        </a>
                    </button>
                </form>
                </td>
            </tr>
            <?php $ctr++; ?>
        @endforeach
    </tbody>
  </table>
  </div>
</div>
@endsection
