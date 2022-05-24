<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-VA-Compatible" content="ie-edge">
    <title>Document</title>
</head>

<style>
    .page-break {
        page-break-after: always
    }
    h1 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 180%;
        /* text-align: center; */
    }
    h2 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 120%;
        /* text-align: center; */
        font-style: normal;
    }
    h3 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 120%;
        font-style: normal;
    }
    p {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 100%;
        font-style: normal;

    }
    table {
        width: 100%;
        font-family: Arial, Helvetica, sans-serif;
    }
    .center {
        text-align: center;
    }
    .right {
        text-align: right;
    }
    .left {
        text-align: left;
    }
    .bold {
        font-weight: bold;   
    }
</style>

<body>

    {{-- <table>
        <tr>
            <td style="width:1px">
                <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('sflogo.png')))}}" width="80"/>
            </td>
            <td>
                <h1 class="center">KERAJAAN SABAH MALAYSIA</h1>
                <h2 class="center">JABATAN PERHUTANAN</h2>
            </td>
        </tr>
    </table> --}}

    <img style="position:absolute" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('sflogo.png')))}}" width="80"/>

    <h1 class="center">KERAJAAN SABAH MALAYSIA</h1>
    <h2 class="center">JABATAN PERHUTANAN</h2>
    <h3 class="center">Timber Disposal Permit Summary</h3>
    <h3 class="right">{{ $tdpNo }}</p>
    <h3>{{ $permit->user->licensee->name }}</h3>

    <p>
        {{ $permit->user->licensee->address_1 }} <br>
        {{ $permit->user->licensee->address_2 }} <br>
    </p>

    <table>
        <tr>
            <td class="right">License No</td>
            <td class="right">:</td>
            <td>{{ $permit->license->name }}</td>

            <td class="right">Account No</td>
            <td class="right">:</td>
            <td>{{ $permit->licenseAccount->account_no }}</td>

            <td class="right">Coupe No</td>
            <td class="right">:</td>
            <td>{{ $permit->licenseAccount->coupe_no }}</td>
        </tr>

        <tr>
            <td class="right">Market</td>
            <td class="right">:</td>
            <td>{{ $permit->market }}</td>

            <td class="right">Land Type</td>
            <td class="right">:</td>
            <td>{{ $permit->landtype->name }}</td>

            <td class="right">District</td>
            <td class="right">:</td>
            <td>{{ $permit->district->name }}</td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td>
                Logging Method: {{ $permit->logging_method }}
            </td>
            <td>
                Scaled Date: {{ $permit->scaled_date }}
            </td>
            <td>
                Receipt No.: {{ $permit->receipt_no }}
            </td>
            <td>
                Payment Date.: {{ $permit->payment_date }}
            </td>
        </tr>
    </table>
    <br>

    <table >
        <tr style="font-weight:bold;">
            <td>
                Total Logs: {{ number_format($permit->permitDetails->count()) }}
            </td>
            <td>
                Total Volume: {{ number_format($permit->billed_vol, 2) }} m3
            </td>
            <td>
                Total Amount: {{ number_format($permit->billed_amount, 2) }}
            </td>
        </tr>
    </table>
    <br>

    {{-- <p>Other Charges</p> --}}
    @if ($permit->permitCharges->count() > 0)
        <table>
            <thead>
                <th class="left">Charges Involved</th>
                <th class="right">Type</th>
                <th class="right">Amount</th>
            </thead>
            <tbody>
            @foreach ($permit->permitCharges as $permitCharge)
                <tr>
                    <td>
                        {{ $permitCharge->name }} {{ $permitCharge->description }}
                    </td>            
                    <td class="right">
                        {{ number_format($permitCharge->amount, 2) }}
                        {{ $permitCharge->unit }}
                    </td>            
                    <td class="right">
                        {{ number_format($permitCharge->total, 2) }}
                    </td>            
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>        
    @endif

    {{-- <p>Species Information</p> --}}
    <table>
        <thead>
            <th class="left">Species</th>
            <th class="right">No. of logs</th>
            <th class="right">Volume</th>
        </thead>
        <tbody>
        @foreach ($speciesSums as $key => $speciesSum)
            <tr>
                <td>
                    {{ $key }}
                </td>            
                <td class="right">
                    {{ $speciesSum->count() }}
                </td>            
                <td class="right">
                    {{ number_format($speciesSum->sum(),2) }}
                </td>            
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>

    {{-- <p>Sizes</p> --}}
    <table>
        <thead>
            <th class="left">Size</th>
            <th class="right">No. of logs</th>
            <th class="right">Volume</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    29cm and below
                </td>
                <td class="right">
                    {{ $below29->count() }}
                </td>
                <td class="right">
                    {{ number_format($below29->sum('vol'),2) }}
                </td>
            </tr>

            <tr>
                <td>
                    Between 30 to 44cm
                </td>
                <td class="right">
                    {{ $between30to44->count() }}
                </td>
                <td class="right">
                    {{ number_format($between30to44->sum('vol'),2) }}
                </td>
            </tr>
            <tr>
                <td>
                    Between 45 to 59cm
                </td>
                <td class="right">
                    {{ $between45to59->count() }}
                </td>
                <td class="right">
                    {{ number_format($between45to59->sum('vol'),2) }}
                </td>
            </tr>
            <tr>
                <td>
                    60cm and above
                </td>
                <td class="right">
                    {{ $above60->count() }}
                </td>
                <td class="right">
                    {{ number_format($above60->sum('vol'),2) }}
                </td>
            </tr>
        </tbody>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
    <table width=100% height=100%>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td width=25%><hr></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="center" width=25%>b.p. Ketua Konservator Hutan</td>
            </tr>
        </tbody>
    </table>


    <div class="page-break"></div>

    <img style="position:absolute" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('sflogo.png')))}}" width="80"/>
    <h1 class="center">KERAJAAN SABAH MALAYSIA</h1>
    <h2 class="center">JABATAN PERHUTANAN</h2>
    <h3 class="center">Timber Disposal Permit Listing</h3>
    <h3 class="right">{{ $tdpNo }}</p>
    <h3>{{ $permit->user->licensee->name }}</h3>

    <p>
        {{ $permit->user->licensee->address_1 }} <br>
        {{ $permit->user->licensee->address_2 }} <br>
    </p>

    <table>
        <tr>
            <td class="right">License No</td>
            <td class="right">:</td>
            <td>{{ $permit->license->name }}</td>

            <td class="right">Account No</td>
            <td class="right">:</td>
            <td>{{ $permit->licenseAccount->account_no }}</td>

            <td class="right">Coupe No</td>
            <td class="right">:</td>
            <td>{{ $permit->licenseAccount->coupe_no }}</td>
        </tr>

        <tr>
            <td class="right">Market</td>
            <td class="right">:</td>
            <td>{{ $permit->market }}</td>

            <td class="right">Land Type</td>
            <td class="right">:</td>
            <td>{{ $permit->landtype->name }}</td>

            <td class="right">District</td>
            <td class="right">:</td>
            <td>{{ $permit->district->name }}</td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td>
                Logging Method: {{ $permit->logging_method }}
            </td>
            <td>
                Scaled Date: {{ $permit->scaled_date }}
            </td>
            <td>
                Receipt No.: {{ $permit->receipt_no }}
            </td>
            <td>
                Payment Date.: {{ $permit->payment_date }}
            </td>
        </tr>
    </table>
    <br>









    <table>
        <thead>
        <tr>
            <th class="left">Log No.</th>
            <th class="left">Species</th>
            <th class="right">Length</th>
            <th class="right">Mean</th>
            <th class="right">Vol</th>
            <th class="right">Royalty</th>
            <th class="right">Premium</th>
            <th class="right">Total</th>
        </tr>
        </thead>
        <tbody>

    @foreach ($permit->permitDetails as $permitdetail)
        <tr>
            <td>
                {{ $permitdetail->log_no }}
            </td>
            <td>
                {{ $permitdetail->species->name }}
            </td>
            <td class="right">
                {{ $permitdetail->length }}
            </td>
            <td class="right">
                {{ $permitdetail->mean }}
            </td>
            <td class="right">
                {{ $permitdetail->vol }}
            </td>
            <td class="right">
                {{ $permitdetail->royalty }}
            </td>
            <td class="right">
                {{ $permitdetail->premium }}
            </td>
            <td class="right">
                {{ number_format($permitdetail->amount,2) }}
            </td>
        </tr>

        @if ($index == 20)
            </tbody>
            </table>    
            
            <div class="page-break"></div>
            


            <img style="position:absolute" src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('sflogo.png')))}}" width="80"/>
            <h1 class="center">KERAJAAN SABAH MALAYSIA</h1>
            <h2 class="center">JABATAN PERHUTANAN</h2>
            <h3 class="center">Timber Disposal Permit Listing</h3>
            <h3 class="right">{{ $tdpNo }}</p>
            <h3>{{ $permit->user->licensee->name }}</h3>
        
            <p>
                {{ $permit->user->licensee->address_1 }} <br>
                {{ $permit->user->licensee->address_2 }} <br>
            </p>
        
            <table>
                <tr>
                    <td class="right">License No</td>
                    <td class="right">:</td>
                    <td>{{ $permit->license_no }}</td>
        
                    <td class="right">Account No</td>
                    <td class="right">:</td>
                    <td>{{ $permit->licensee_ac_no }}</td>
        
                    <td class="right">Coupe No</td>
                    <td class="right">:</td>
                    <td>{{ $permit->coupe_no }}</td>
                </tr>
        
                <tr>
                    <td class="right">Market</td>
                    <td class="right">:</td>
                    <td>{{ $permit->market }}</td>
        
                    <td class="right">Land Type</td>
                    <td class="right">:</td>
                    <td>{{ $permit->landtype->name }}</td>
        
                    <td class="right">District</td>
                    <td class="right">:</td>
                    <td>{{ $permit->district->name }}</td>
                </tr>
            </table>
        
            <br>
        
            <table>
                <tr>
                    <td>
                        Logging Method: {{ $permit->logging_method }}
                    </td>
                    <td>
                        Scaled Date: {{ $permit->scaled_date }}
                    </td>
                    <td>
                        Receipt No.: {{ $permit->receipt_no }}
                    </td>
                    <td>
                        Payment Date.: {{ $permit->payment_date }}
                    </td>
                </tr>
            </table>
            <br>







            <table>
                <thead>
                <tr>
                    <th class="left">Log No.</th>
                    <th class="left">Species</th>
                    <th class="right">Length</th>
                    <th class="right">Mean</th>
                    <th class="right">Vol</th>
                    <th class="right">Royalty</th>
                    <th class="right">Premium</th>
                </tr>
                </thead>
                <tbody>
        
        @endif

        @php
            if($index == 20){
                $index = 0;
            }
            $index = $index + 1;
        @endphp

    @endforeach
    </tbody>
    </table>
    
</body>
</html>


