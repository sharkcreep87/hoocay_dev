<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                 <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>{{$First_name}} {{$last_name}}</data></strong>
                        <br>
                        {{$address}}
                        <br>
                        {{$city}}
                        <br>
                         <br>
                        {{$state}}
                        <br>
                        <abbr title="Phone">Phone:</abbr> {{$phone}}
                    </address>
                       <p>
                        <em>Date: {{ date('d-m-Y H:i:s') }}</em>
                    </p>
                    <p>
                        <em>Receipt #: {{$ref_no}}</em>
                    </p>
                    <p>
                        <em>Payment Type : Withdrawal</em>
                    </p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                 
                </div>
            </div>
            <div class="row">
               
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Items</th>
                            <th class="text-center">Bank</th>
                            <th class="text-center">Account Name</th>
                            <th class="text-center">Account No</th>
                           
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-1">{{$method}}</h4></td>
                            <td class="col-md-1" style="text-align: center"> {{$bank}} </td>
                            <td class="col-md-1" style="text-align: center"> {{$acct_name}} </td>
                            <td class="col-md-1" style="text-align: center"> {{$acct_no}} </td>
                        
                            <td class="col-md-1 text-center">RM{{$amount}}</td>
                        </tr>
                       
                       
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
  