<link rel="stylesheet" href="<?php echo MOD_URL.$module;?>/assets/css/custom.css">
<style>
.rentinfo-seatplan {
    width: 685px;
}

.action-width {
    width: 80px;
}
</style>
<div id="reservation">
    <div class="card mb-4">
        <div class="card-header py-2 ">
            <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("hall_room")." ".display("reservation_details") ?>
                <span id="msg" class="red-message"></span><small class="float-right"><a href="#" id="view_checin"
                        class="btn btn-primary btn-sm"><i class="ti-plus" aria-hidden="true"></i>
                        <?php echo display("hall")." ".display('booking_list')?></a></small>
            </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display("s_date") ?> <span
                                class="text-danger">*</span></label>
                        <div class="icon-addon addon-md">
                            <input type="text" name="datefilter" class="form-control datefilter" id="datefilter1"
                                placeholder="mm/dd/yyyy --:-- --" value="" />
                            <label class="fas fa-calendar-alt"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display("e_date") ?><span
                                class="text-danger">*</span></label>
                        <div class="icon-addon addon-md">
                            <input type="text" name="datefilter" class="form-control datefilter" id="datefilter2"
                                placeholder="mm/dd/yyyy --:-- --" value="" />
                            <label class="fas fa-calendar-alt"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display("event_name") ?><span
                                class="text-danger">*</span></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="event_name"
                                placeholder="<?php echo display("event_name") ?>">
                            <label class="fas fa-calendar-check"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display("event_type") ?><span
                                class="text-danger">*</span></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="event_type"
                                placeholder="<?php echo display("event_type") ?>">
                            <label class="fas fa-calendar-day"></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 mb-3">
                    <div class="form-group mb-0">
                        <label class="font-weight-600 mb-1"><?php echo display("remarks") ?></label>
                        <div class="icon-addon addon-md">
                            <input type="text" class="form-control" id="booking_remarks"
                                placeholder="<?php echo display("remarks") ?>">
                            <label class="fas fa-comment-dots"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("hall")." ".display("room_detail") ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered white-space-nowrap mb-0 room-list">
                    <tbody>
                        <tr>
                            <th colspan="2"><?php echo display("hall")." ".display("room_info") ?></th>
                            <th class="action-width"><?php echo display("action") ?></th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label
                                                        class="font-weight-600 mb-1"><?php echo display("hallroom_type") ?>
                                                        <span class="text-danger">*</span></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <select class="selectpicker form-select" data-live-search="true"
                                                            data-width="100%" onchange="getroomno()" id="room_type">
                                                            <option value="" selected>Choose
                                                                <?php echo display("hallroom_type") ?></option>
                                                            <?php foreach($hallroomdetails as $btype){ ?>
                                                            <option value="<?php echo html_escape($btype->hid); ?>">
                                                                <?php echo html_escape($btype->hall_type);?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label class="fas fa-sort-amount-down"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label
                                                        class="font-weight-600 mb-1"><?php echo display("hall_room")." ".display("no") ?>
                                                        <span class="text-danger">*</span></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <select name=roomno[] class="selectpicker form-select"
                                                            data-live-search="true" data-width="100%"
                                                            onchange="getcapcity()" disabled id="roomno">
                                                            <option value="" selected>
                                                                <?php echo display("hall_room")." ".display("no") ?>
                                                            </option>
                                                        </select>
                                                        <label class="fas fa-sort-numeric-down"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-0">
                                                <div class="form-group mb-0">
                                                    <label
                                                        class="font-weight-600 mb-1">#<?php echo display("people") ?></label>
                                                    <div class="icon-addon addon-md input-left-icon">
                                                        <input type="number" min="1" disabled class="form-control"
                                                            id="adults" placeholder="<?php echo display("people") ?>">
                                                        <label class="fas fa-restroom"></label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td rowspan="3" class="text-center">
                                <button type="button" onclick="rdel(<?php echo 0; ?>)"
                                    class="btn btn-danger btn-sm rdel<?php echo 0; ?>"><i
                                        class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><?php echo display("occupant_info") ?></span>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-primary dropdown-toggle no-caret" type="button"
                                            id="custdetailbtn" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#exampleModal"><?php echo display("new_customer") ?></a>
                                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#exampleModal2"><?php echo display("old_customer") ?></a>
                                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"
                                                data-target="#exampleModal3"><?php echo display("checkin")." ".display("customer") ?></a>
                                        </div>
                                    </div>
                                </div>

            </div>
            </th>
            <th class="rentinfo-seatplan"><?php echo display("seatplan")." And ".display("rent_info") ?></th>
            </tr>
            <tr>
                <td>
                    <table class="table table-borderless customerdetail">
                        <thead>
                            <tr>
                                <th class="pl-0" width="20"><?php echo display("sl") ?></th>
                                <th><?php echo display("candidate_name") ?></th>
                                <th><?php echo display("mobile_no") ?>.</th>
                                <th class="text-right pr-0"><?php echo display("action") ?></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </td>
                <td>
                    <table class="table table-borderless mb-0 order-list">
                        <tbody>
                            <tr>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label class="font-weight-600 mb-1"><?php echo display("seatplan") ?></label>
                                        <div class="icon-addon addon-md">
                                            <select class="selectpicker form-select" disabled data-live-search="true"
                                                data-width="100%" id="seatplan">
                                                <option value="" selected>Choose <?php echo display("seatplan") ?>
                                                </option>
                                            </select>
                                            <label class="fas fa-chair"></label>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label
                                            class="font-weight-600 mb-1"><?php echo display("hall_room")." ".display("rent")."(".display("hourly").")"; ?>
                                        </label>
                                        <div class="icon-addon addon-md">
                                            <input type="number" disabled class="form-control form-control" id="rent"
                                                value="0">
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0">
                                    <div class="form-group mb-0">
                                        <label class="font-weight-600 mb-1">
                                        </label>
                                        <div class="d-flex">
                                            <span class="p-2"><del class="text-danger" id="offer_price"></del></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td class="p-0">
                </td>
                <td class="p-0">
                </td>
                <td class="text-center res-v-allign"><button type="button" disabled
                        class="btn btn-primary btn-sm newroom0" onclick="room(0)" id="newroom"><i
                            class="fas fa-plus"></i></button></td>
            </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 d-flex">
        <div class="card flex-fill w-100">
            <div class="card-header py-3">
                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("payment_details") ?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display("payment_mode") ?></label>
                            <div class="icon-addon addon-md input-left-icon">
                                <select class="selectpicker form-select" data-live-search="true" data-width="100%"
                                    id="paymentmode">
                                    <option value="" selected>Choose <?php echo display("payment_mode") ?></option>
                                    <?php foreach($paymentdetails as $ptype){ ?>
                                    <option value="<?php echo html_escape($ptype->payment_method) ?>">
                                        <?php echo html_escape($ptype->payment_method) ?></option>
                                    <?php } ?>
                                </select>
                                <label class="fas fa-credit-card"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display("total_amount") ?></label>
                            <div class="icon-addon addon-md">
                                <i
                                    class=""><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?></i>
                                <input type="text" disabled class="form-control" id="totalamount"
                                    placeholder="Total amount">
                                <i
                                    class=""><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3" id="carddiv" hidden>
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display("bank_name") ?></label>
                            <div class="icon-addon addon-md">
                                <input type="text" disabled class="form-control" id="cardno"
                                    placeholder="Account number">
                                <label class="fas fa-credit-card"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3" id="bankdiv" hidden>
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display("bank_name") ?></label>
                            <div class="icon-addon addon-md">
                                <select class="selectpicker form-select" data-live-search="true" data-width="100%"
                                    id="bankname">
                                    <option value="" selected>Choose <?php echo display("bank_name") ?></option>
                                    <?php foreach($banklist as $list){ ?>
                                    <option value="<?php echo html_escape($list->HeadName); ?>">
                                        <?php echo html_escape($list->HeadName);?></option>
                                    <?php } ?>
                                </select>
                                <label class="fa fa-university"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display("payment")." ".display("remarks") ?></label>
                            <div class="icon-addon addon-md">
                                <input type="text" class="form-control" id="advanceremarks" disabled
                                    placeholder="<?php  echo display("payment")." ".display("remarks") ?>">
                                <label class="fas fa-comments"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group mb-0">
                            <label class="font-weight-600 mb-1"><?php echo display("paid_amount") ?></label>
                            <div class="icon-addon addon-md">
                                <i
                                    class=""><?php if($currency->position==1){ echo html_escape($currency->curr_icon); } ?></i>
                                <input type="number" disabled class="form-control" id="advanceamount"
                                    placeholder="<?php echo display("paid_amount") ?>">
                                <i
                                    class=""><?php if($currency->position==2){ echo html_escape($currency->curr_icon); } ?></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-right mt-3">
    <button type="button" disabled class="btn btn-primary w-100p" onclick="newBooking()"
        id="bookingsave"><?php echo display('save')?></button>
</div>
<!-- Occupant Details Modal -->
<div class="modal custom-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content border-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo display("occupant_details") ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border mb-4">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("guest_details") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label><?php echo display("country_code") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="code"
                                                    placeholder="<?php echo display("country_code") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="mobileNo"><?php echo display("mobile_no") ?>.</label>
                                            <div class="icon-addon addon-md">
                                                <input type="number" class="form-control" id="mobileNo"
                                                    placeholder="<?php echo display("mobile_no") ?>.">
                                                <label class="fas fa-mobile"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label><?php echo display("title") ?></label>
                                            <div class="icon-addon addon-md">
                                                <select class="form-select" id="title">
                                                    <option selected value="Mr">Mr</option>
                                                    <option value="Ms">Ms</option>
                                                    <option value="Mrs">Mrs.</option>
                                                    <option value="Dr">Dr</option>
                                                    <option value="Engineer">Engineer</option>
                                                </select>
                                                <label class="fas fa-meh"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="firstname"><?php echo display("first_name") ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="firstname"
                                                    placeholder="<?php echo display("first_name") ?>">
                                                <label class="fas fa-user-circle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="lastname"><?php echo display("last_name") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="lastname"
                                                    placeholder="<?php echo display("last_name") ?>">
                                                <label class="fas fa-user-circle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="fathername"><?php echo display("father_name") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="fathername"
                                                    placeholder="<?php echo display("father_name") ?>">
                                                <label class="fas fa-user-circle"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-center mb-3">
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="male" name="customRadioInline"
                                                class="custom-control-input" value="male">
                                            <label class="custom-control-label"
                                                for="male"><?php echo display("male") ?></label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="customRadioInline"
                                                class="custom-control-input" value="female">
                                            <label class="custom-control-label"
                                                for="female"><?php echo display("female") ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="occupation"><?php echo display("occupation") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="occupation"
                                                    placeholder="<?php echo display("occupation") ?>">
                                                <label class="fas fa-anchor"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="dob"><?php echo display("dob") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" autocomplete="off" name="datefilter2"
                                                    class="form-control datefilter2" id="dob" placeholder="mm/dd/yyyy"
                                                    value="" />
                                                <label class="fas fa-calendar-alt"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="anniversary"><?php echo display("anniversary") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" name="datefilter2" autocomplete="off"
                                                    class="form-control datefilter2" id="anniversary"
                                                    placeholder="mm/dd/yyyy" value="" />
                                                <label class="fas fa-calendar-alt"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="nationality"><?php echo display("nationality") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" name="datefilter2" class="form-control"
                                                    id="nationality" placeholder="<?php echo display("nationality") ?>"
                                                    value="" />
                                                <label class="fas fa-flag-usa"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-self-center mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="vip" value="vip" class="custom-control-input"
                                                id="vip">
                                            <label class="custom-control-label"
                                                for="vip"><?php echo display("vip") ?>?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border mb-4">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("contact_details") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="contacttype"><?php echo display("contact_type") ?></label>
                                            <div class="icon-addon addon-md">
                                                <select class="form-select" id="contacttype">
                                                    <option selected value="">Choose
                                                        <?php echo display("contact_type") ?>
                                                    </option>
                                                    <option value="Home">Home</option>
                                                    <option value="Personal">Personal</option>
                                                    <option value="Official">Official</option>
                                                    <option value="Business">Business</option>
                                                </select>
                                                <label class="fas fa-address-book"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="email"><?php echo display("email") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="example@email.com">
                                                <label class="fas fa-envelope"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="floatingSelect"><?php echo display("country") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="country" class="form-control" id="country"
                                                    placeholder="<?php echo display("country") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="floatingSelect"><?php echo display("state") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="state" class="form-control" id="state"
                                                    placeholder="<?php echo display("state") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="floatingSelect"><?php echo display("city") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="city" class="form-control" id="city"
                                                    placeholder="<?php echo display("city") ?>">
                                                <label class="fas fa-globe-americas"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="zipcode"><?php echo display("zipcode") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="number" class="form-control" id="zipcode"
                                                    placeholder="<?php echo display("zipcode") ?>">
                                                <label class="fas fa-code-branch"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating with-icon">
                                            <textarea class="form-control"
                                                placeholder="<?php echo display("address") ?>" id="address"></textarea>
                                            <label for="address"><?php echo display("address") ?></label>
                                            <i class="fas fa-map-pin"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border mb-4 mb-md-0">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("photo_id_details") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="pitype"><?php echo display("photo_id_type") ?></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="pitype"
                                                    placeholder="<?php echo display("photo_id_type") ?>">
                                                <label class="fas fa-images"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group mb-0">
                                            <label for="pid"><?php echo display("photo_id") ?> # <span
                                                    class="text-danger">*</span></label>
                                            <div class="icon-addon addon-md">
                                                <input type="text" class="form-control" id="pid"
                                                    placeholder="<?php echo display("photo_id") ?>">
                                                <label class="fas fa-images"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label><?php echo display("photo_id_upload") ?></label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="image-upload position-relative overflow-hidden m-auto">
                                            <input type="file" id="imgfront" onchange="fileValueOne(this)">
                                            <input type="hidden" id="imgffront">
                                            <label for="imgfront" class="upload-field mb-0" id="file-label">
                                                <span class="file-thumbnail">
                                                    <span
                                                        class="d-block text-center mb-2"><?php echo display("front_side") ?></span>
                                                    <img id="image-preview"
                                                        src="<?php echo base_url()?>/assets/img/proof_icon.png" alt="">
                                                    <span id="filename"
                                                        class="d-block mt-2"><?php echo display("drag_and_drop") ?></span>
                                                    <span class="format"><?php echo display("supports_image") ?></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="image-upload position-relative overflow-hidden m-auto">
                                            <input type="file" id="imgback" onchange="fileValuesTwo(this)">
                                            <input type="hidden" id="imgbback">
                                            <label for="imgback" class="upload-field mb-0" id="file-label">
                                                <span class="file-thumbnail">
                                                    <span
                                                        class="d-block text-center mb-2"><?php echo display("back_side") ?></span>
                                                    <img id="image-preview2"
                                                        src="<?php echo base_url()?>assets/img/proof_icon.png" alt="">
                                                    <span id="filename2"
                                                        class="d-block mt-2"><?php echo display("drag_and_drop") ?></span>
                                                    <span class="format"><?php echo display("supports_image") ?></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating with-icon">
                                            <textarea class="form-control" placeholder="Remarks"
                                                id="comments"></textarea>
                                            <i class="far fa-comment-dots"></i>
                                            <label for="comments"><?php echo display("comments") ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill w-100 border">
                            <div class="card-header py-3">
                                <h6 class="fs-17 font-weight-600 mb-0"><?php echo display("guest_image") ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-lg-6 mb-3">
                                        <div class="image-upload position-relative overflow-hidden m-auto">
                                            <input type="file" id="imgguest" onchange="fileValuesThree(this)">
                                            <input type="hidden" id="imggguest">
                                            <label for="imgguest" class="upload-field mb-0" id="file-label">
                                                <span class="file-thumbnail">
                                                    <span
                                                        class="d-block text-center mb-2"><?php echo display("occupant_image") ?></span>
                                                    <img id="image-preview3"
                                                        src="<?php echo base_url()?>/assets/img/user.png" alt="">
                                                    <span id="filename3"
                                                        class="d-block mt-2"><?php echo display("drag_and_drop") ?></span>
                                                    <span class="format"><?php echo display("supports_image") ?></span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-dismiss="modal"><?php echo display("close") ?></button>
                <button type="button" disabled class="btn btn-primary"
                    id="addcustomer"><?php echo display("ad") ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo display("old_customer") ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-floating with-icon mb-3">
                    <input type="number" class="form-control" id="existmobile"
                        placeholder="<?php echo display("mobile_no") ?>" value="">
                    <label><?php echo display("mobile_no") ?></label>
                    <i class="fas fa-mobile"></i>
                </div>
                <ul id="searchResult"></ul>
                <div class="clear"></div>
                <div class="form-floating with-icon">
                    <input type="text" class="form-control" id="existname"
                        placeholder="<?php echo display("customer_name") ?>" disabled value="">
                    <input type="hidden" class="form-control" id="existcustid" placeholder="Customer Name" disabled
                        value="">
                    <label><?php echo display("customer") ?></label>
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="modal-footer py-2 px-4">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php echo display("close") ?></button>
                <button type="button" disabled id="addoldcustomer"
                    class="btn btn-primary"><?php echo display("ad") ?></button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo display("checkin")." ".display("customer") ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <div class="form-floating with-icon mb-3">
                    <select class="selectpicker form-select" data-live-search="true" data-width="100%"
                        onchange="getcustinfo()" id="checkinexistmobile">
                        <option value="" selected>Choose
                            <?php echo display("mobile_no") ?></option>
                        <?php foreach($checkincustomer as $btype){ ?>
                        <option value="<?php echo html_escape($btype->bookedid); ?>">
                            <?php echo html_escape($btype->cust_phone)."(".html_escape($btype->booking_number).")";?></option>
                        <?php } ?>
                    </select>
                    <label><?php echo display("mobile_no") ?></label>
                    <i class="fas fa-mobile"></i>
                </div>
                <ul id="searchResult"></ul>
                <div class="clear"></div>
                <div class="form-floating with-icon">
                    <input type="text" class="form-control" id="checkinexistname"
                        placeholder="<?php echo display("customer_name") ?>" disabled value="">
                    <input type="hidden" class="form-control" id="checkinexistcustid" placeholder="Customer Name"
                        disabled value="">
                    <input type="hidden" class="form-control" id="checkinbookedid" placeholder="Customer Name"
                        disabled value="">
                    <label><?php echo display("customer") ?></label>
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="modal-footer py-2 px-4">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal"><?php echo display("close") ?></button>
                <button type="button" disabled id="addcheckincustomer"
                    class="btn btn-primary"><?php echo display("ad") ?></button>
            </div>
        </div>
    </div>
</div>
</div>
<div id="roomtlist" hidden>
    <?php foreach($hallroomdetails as $btype){ ?>
    <option value="<?php echo html_escape($btype->hid); ?>"><?php echo html_escape($btype->hall_type);?></option>
    <?php } ?>
</div>
<input type="hidden" id="alluser"><input type="hidden" id="allmobile"><input type="hidden" id="allemail"><input
    type="hidden" id="allpitype"><input type="hidden" id="alluserid">
<input type="hidden" id="alllastname"><input type="hidden" id="allgender"><input type="hidden" id="allfather"><input
    type="hidden" id="allpid">
<input type="hidden" id="alloccupation"><input type="hidden" id="alldob"><input type="hidden" id="allanniversary"><input
    type="hidden" id="allimgfront">
<input type="hidden" id="allnationality"><input type="hidden" id="allvip"><input type="hidden" id="allcomments"><input
    type="hidden" id="allimgback">
<input type="hidden" id="allimgguest"><input type="hidden" id="allcontacttype"><input type="hidden" id="allstate"><input
    type="hidden" id="allcity">
<input type="hidden" id="allzipcode"><input type="hidden" id="alladdress"><input type="hidden" id="allcountry">
<input type="hidden" id="intime"
    value="<?php echo date("Y-m-d"); ?> <?php echo html_escape($inouttime->checkintime); ?>">
<input type="hidden" id="outtime"
    value="<?php echo date("Y-m-d"); ?> <?php echo html_escape($inouttime->checkouttime); ?>">
<input type="hidden" id="finyear" value="<?php echo financial_year(); ?>"><input type="hidden" id="findate"
    value="<?php echo maxfindate(); ?>">
<input type="hidden" value="<?php echo html_escape($setting->tax) ?>" id="tax">
<input type="hidden" value="<?php echo html_escape($setting->servicecharge) ?>" id="scharge">

<script src="<?php echo MOD_URL.$module;?>/assets/js/addreservation.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/custom.js"></script>
<script src="<?php echo MOD_URL.$module;?>/assets/js/booking.js"></script>