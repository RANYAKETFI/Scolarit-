@extends('layouts.app')
@section('content')
<div class="container" >
        <h1><center> Mes absences</center></h1>
        <br>

      <table id="table" class="table" style="background-color:#FBEFF2;">
    <thead>
 <tr>
   <tr>

   </tr>
  <th>Id</th>
  <th>modules </th>
  <th>Date </th>

  <th>justifie</th>
 </tr>
</thead>
    <tbody>
      @foreach($abs as $absence)
      <tr>
      <td> {{$absence->id}} </td>
       <td>  {{$absence->module}} </td>
       <td>  {{$absence->date}} </td>
       <?php
       if($absence->justifie==0)
       {echo
         '<td>  Non justifiée </td>';
       }
       else {
         echo
         '<td>  justifiée </td>';
       }
        ?>

    </tr>
      @endforeach
    </tbody>
</table>

@endsection
