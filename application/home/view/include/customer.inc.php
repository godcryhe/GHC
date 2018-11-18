<div class="container">
        <div class="row">
            <div class="col-2 shadow-sm mb-1 bg-light rounded font-weight-bold">
                Customer ID
            </div>
            <div class="col mb-1">
                <?php $pageData->customer->cust_no ?>
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Customer role
            </div>
            <div class="col mb-1">
                {$data->cust_role_str}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Date of birth
            </div>
            <div class="col mb-1">
                {$data->customer->date_of_birth}
            </div>
        </div>
        <div class="row">
            <div class="col-2 shadow-sm mb-1 bg-light rounded font-weight-bold">
                Last name
            </div>
            <div class="col mb-1">
                {$data->customer->last_name}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                First name
            </div>
            <div class="col mb-1">
                {$data->customer->first_name}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Initials
            </div>
            <div class="col mb-1">
                {$data->customer->initials}
            </div>
        </div>
        <div class="row">
            <div class="col-2 shadow-sm mb-1 bg-light rounded font-weight-bold">
                Address
            </div>
            <div class="col-6 mb-1">
                {$data->customer->address}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Postal code
            </div>
            <div class="col mb-1">
                {$data->customer->postal_code}
            </div>
        </div>
        <div class="row">
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                City
            </div>
            <div class="col mb-1">
                {$data->customer->city}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Province
            </div>
            <div class="col mb-1">
                {$data->customer->province}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Country
            </div>
            <div class="col mb-1">
                {$data->customer->country}
            </div>
        </div>
        <div class="row">
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Phone 1
            </div>
            <div class="col mb-1">
                {$data->customer->phone1}({$data->customer->phone1_type})
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Phone 2
            </div>
            <div class="col mb-1">
                <?php if($data->customer->phone2 != null){?>
                {$data->customer->phone2}({$data->customer->phone2_type})
                <?php }?>
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Email
            </div>
            <div class="col mb-1">
                {$data->customer->email}
            </div>
        </div>
        <div class="row">
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Document type
            </div>
            <div class="col mb-1">
                {$data->customer->docType->name}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Document number
            </div>
            <div class="col mb-1">
                {$data->customer->doc_no}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Expiration date
            </div>
            <div class="col mb-1">
                {$data->customer->expire_date}
            </div>
        </div>
        <div class="row">
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Place of issue
            </div>
            <div class="col mb-1">
                {$data->customer->issue_place}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Frequency
            </div>
            <div class="col mb-1">
                {$data->customer->frequency}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Average amount
            </div>
            <div class="col mb-1">
                {$data->customer->ave_amt}
            </div>
        </div>
        <div class="row">
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Occupation
            </div>
            <div class="col mb-1">
                {$data->customer->occupation}
            </div>
            <div class="col shadow-sm mb-1 bg-light rounded font-weight-bold">
                Purpose
            </div>
            <div class="col-6 mb-1">
                {$data->customer->purpose}
            </div>
        </div>
    </div>