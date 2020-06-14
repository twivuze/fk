<div class="table-responsive">
    <table class="table" id="links-table">
        <thead>
        <tr>
            <th>Code</th>
            <th>Enterprise</th>
            <th>Rate</th>
            <th>Loans</th>
            <th colspan="2">Repayments</th>
            <th colspan="2">Interst Rate</th>
         </tr>
         <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
           
            <th>Repayment Per Instalment </th>
             <th>Total Repayments</th>

            <th>Instalment Rate</th>
            <th>Total Interst Rate</th>
           
         </tr>

        </thead>
        <tbody>
        @foreach($transfers as $transfer)
        <?php 
    $interset = new \App\User();
     $result = $interset->interestProcessing($transfer);
     ?>
            <tr>
            <td>{!! $transfer->code !!}</td>
            <td>{!! $transfer->enterprise !!}</td>
            

                <td> {!! $transfer->rate !!}%</td>
                <td>{!! $transfer->currency !!} {!! $transfer->amount !!}</td>
                <td><b>{!! $transfer->currency !!}  {{$result['amountToPay']+$result['totalInstalment']}}
                per 
                <br>  <b>{{ $transfer->instalmentPeriod->name }}</b>
                </td>

                <td><b>{!! $transfer->currency !!}  {{$result['totalRepayment']}}
                per <br />  
                <b>{{ $transfer->recoverPeriod->name }}</b></td>
                <td><b>{{ $transfer->currency }} {{ $result['totalInstalment'] }} per </b>
                <br>  <b>{{ $transfer->instalmentPeriod->name }}</b></td>
                <td> <b>{{ $transfer->currency }} {{ $result['totalRecover']}} per </b><br />  
                <b>{{ $transfer->recoverPeriod->name }}</b></td>
               
                   
    
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
