<html>
<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
            body {
                height: 700px;
            }
            td{
                padding: 0px;
                font-size: 12px;
            }
    </style>
</head>
<body style ="margin:0">
        {{-- TABLE 1 --}}
        <table width = "100%" cellpadding="0" cellspacing="0">
            <tr>
                <td ><img src="./uploads/logo/ingram-blue.png" style="height:50px;display:inline-block;"></td>
                <td >CONTROL NO.: {{$vendor->code}}
                        <?php
                        $num = $vendor->id;
                        $num_padded = sprintf("%06d", $num);
                        echo $num_padded;
                        ?>
                </td>
            </tr>
            <tr>
                <td >CONTRACT REVIEW ROUTING SLIP</td>
                <td >DATE ENDORSED: {{$vendor->created_at}}</td>
            </tr>
        </table>
        {{-- TABLE 2 --}}
        <table class="table table-sm" border  = 1 width = "100%" cellpadding="0" cellspacing="0">
            <tr>    
                <td >Title and Nature of Contract</td>
            <td>{{$vendor->contract_type}} | {{$vendor->category_type}}</td>
            </tr>
            <tr>    
                <td>Name of Requestor / Department</td>
            <td>{{$vendor->user['name']}} {{$vendor->department}}</td>
            </tr>
            <tr>    
                <td>Name of Supplier/ 
                        Service Provider</td>
                <td>{{$vendor->name}}</td>
            </tr>
            <tr>    
                <td>Contract Amount</td>
                <td>N/A</td>
            </tr>
        </table>
        {{-- TABLE 3 --}}
        <table class="table table-sm" border = 1 width = "100%" cellpadding="0" cellspacing="0" >
            <thead style="background-color:black; color:white;">
                <tr>
                    <th></th>
                    <th>Signatory</th>
                    <th>Date</th>
                    <th>Signature</th>
                </tr>
                
            </thead>
            <tbody>
                <tr >
                    <td>Requestor</td>
                    <td>SHERRY ANN REYES / TONIE GRACE VERA CRUZ</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr >
                        <td rowspan = 2>HRBP
                            <h6>(for purchase of Global Services, real estate leases & similar arrangements)</h6>
                            Local Corporate Attorney
                            <h6>(for purchase of Local Services)</h6>
                        </td>
                        <td rowspan = 2> ATTORNEY ANNA MARIE JOSSETTE AMONCIO</td>
                        <td rowspan = 2></td>
                        <td rowspan = 2></td>
                    </tr>
                        
                    
                    <tr>
                        {{-- ROWSPAN --}}
                    </tr>
                    <tr>
                        <td>Director for HR</td>
                        <td> SAM WHITE</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Finance - Controller</td>
                        <td> REYNALDO MENESES JR</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Executive Director – Shared Services Center </td>
                        <td>VIGOR AMADOR JR.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Strategic Sourcing Director </td>
                        <td>DARRELL STEMPKE</td>
                        <td></td>
                        <td></td>
                    </tr>
    
                    <tr>
                        <td>SVP, Shared Services </td>
                        <td>JANA VONDRAN</td>
                        <td></td>
                        <td></td>
                    </tr>
            
            </tbody>
        </table>
        {{-- TABLE 4 --}}
        <table class="table table-sm" border = 1 width = "100%" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                            <th ></th>
                            <th >CHECK LIST</th>
                            <th >Yes or No</th>
                            <th >Comments</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>PRODUCT / SERVICE DESCRIPTION</td>
                    <td>DATA PRIVACY ACT</td>
                    <td></td>
                    <td>Please see attached contract.</td>
                </tr>
                <tr>
                    <td>PAYMENT TERMS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>AFCE REQUIRED</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>SUPPLIER ETHICS FORM</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>3 WAY CANVASS</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>MEETING WITH PURCHASING</td>
                    <td>SUPPLIER MET WITH PURCHASING/REQUESTOR AND DON’T HAVE CONNECTION WITH COMPANY’S OFFICER ETC.</td>
                    <td>YES</td>
                    <td>SUPPLIER MET WITH THE REQUESTORS</td>
                </tr>
            </tbody>
        </table>
          

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

