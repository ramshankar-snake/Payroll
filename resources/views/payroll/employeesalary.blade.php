@extends('layouts.master')
@section('content')

    {{-- message --}}
    {!! Toastr::message() !!}
    <!-- Sidebar -->


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee Salary <span id="year"></span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Salary</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i
                                class="fa fa-plus"></i> Add Salary</a>
                    </div>
                </div>
            </div>

            <!-- Search Filter -->
            <form action="{{ url('salary/search') }}" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <input type="text" name="name" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>

                    {{-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option value=""> -- Select -- </option>
                            <option value="">Employee</option>
                            <option value="1">Manager</option>
                        </select>
                        <label class="focus-label">Role</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                    <div class="form-group form-focus select-focus">
                        <select class="select floating">
                            <option> -- Select -- </option>
                            <option> Pending </option>
                            <option> Approved </option>
                            <option> Rejected </option>
                        </select>
                        <label class="focus-label">Leave Status</label>
                    </div>
                </div> --}}
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input name="f_date" class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">From</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <div class="cal-icon">
                                <input name="t_date" class="form-control floating datetimepicker" type="text">
                            </div>
                            <label class="focus-label">To</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"></div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12"></div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <button type="submit" href="#" class="btn btn-success btn-block"> Search </button>
                    </div>
                </div>
            </form>
            <!-- /Search Filter -->
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Employee ID</th>
                                    <th>Email</th>
                                    <th>Join Date</th>
                                    <th>Employee</th>
                                    {{-- <th>Salary</th> --}}
                                    <th style="text-align:center" colspan="2">Payslip</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $items)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{ url('employee/profile/' . $items->rec_id) }}" class="avatar">
                                                    @if ($items->image)
                                                        <img alt=""
                                                            src="{{ URL::to('storage/uploads/' . $items->image) }}">
                                                </a>
                                            @else
                                                <img alt="" src="{{ URL::to('storage/user.png') }}"></a>
                                @endif
                                <a
                                    href="{{ url('employee/profile/' . $items->rec_id) }}">{{ $items->emp_name }}<span>{{ $items->designation }}</span></a>
                                </h2>
                                </td>
                                <td>{{ $items->employee_id }}</td>
                                <td hidden class="id">{{ $items->id }}</td>
                                <td hidden class="name">{{ $items->emp_name }}</td>
                                <td hidden class="basic">{{ $items->basic }}</td>
                                <td hidden class="da">{{ $items->da }}</td>
                                <td hidden class="hra">{{ $items->hra }}</td>
                                <td hidden class="conveyance">{{ $items->conveyance }}</td>
                                <td hidden class="allowance">{{ $items->allowance }}</td>
                                <td hidden class="medical_allowance">{{ $items->medical_allowance }}</td>
                                <td hidden class="tds">{{ $items->tds }}</td>
                                <td hidden class="esi">{{ $items->esi }}</td>
                                <td hidden class="pf">{{ $items->pf }}</td>
                                <td hidden class="leave">{{ $items->leave }}</td>
                                <td hidden class="tel_int">{{ $items->telephone_internet }}</td>
                                <td hidden class="wfh">{{ $items->wfh }}</td>
                                <td hidden class="work_in_holidays_hours">{{ $items->work_in_holidays_hours }}</td>
                                <td hidden class="work_in_holidays_days">{{ $items->work_in_holidays_days }}</td>

                                <td hidden class="labour_welfare">{{ $items->labour_welfare }}</td>
                                <td>{{ $items->email }}</td>
                                <td>{{ $items->doj }}</td>
                                <td><a class="btn btn-sm btn-info"
                                        href="{{ url('employee/profile/' . $items->rec_id) }}">View Details</a></td>
                                <td><a class="btn btn-sm btn-warning"
                                        href="{{ url('/send_pdf/' . $items->rec_id) }}">Send</a></td>
                                <td hidden class="salary">{{ $items->salary }}</td>

                                <td><a class="btn btn-sm btn-primary"
                                        href="{{ url('form/salary/view/' . $items->rec_id) }}">View</a></td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item userSalary" href="#" data-toggle="modal"
                                                data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item salaryDelete" href="#" data-toggle="modal"
                                                data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        <!-- Add Salary Modal -->
        <div id="add_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Staff Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/salary/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Employee</label>
                                        <select
                                            class="select select2s-hidden-accessible @error('name') is-invalid @enderror"
                                            style="width: 100%;" tabindex="-1" aria-hidden="true" id="name"
                                            name="name">
                                            <option value="">-- Choose Employee --</option>
                                            @foreach ($userList as $user)
                                                <option value="{{ $user->id }}" data-employee_id={{ $user->id }}>
                                                    {{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <input class="form-control" type="hidden" name="rec_id" id="employee_id" readonly>
                                <div class="col-sm-6">
                                    <label>CTC</label>
                                    <input class="form-control @error('salary') is-invalid @enderror" readonly
                                        type="number" name="salary" id="salary" value="{{ old('salary') }}"
                                        placeholder="Enter net salary">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic (40% of CTC)</label>
                                        <input class="form-control @error('basic') is-invalid @enderror" type="number"
                                            readonly name="basic" id="basic" value="{{ old('basic') }}"
                                            placeholder="Enter basic">
                                        @error('basic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>DA(20% of Basic Salary)</label>
                                        <input class="form-control @error('da') is-invalid @enderror" type="number"
                                            readonly name="da" id="da" value="{{ old('da') }}"
                                            placeholder="Enter DA(40%)">
                                        @error('da')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>HRA(40% of Basic Salary)</label>
                                        <input class="form-control @error('hra') is-invalid @enderror" type="number"
                                            readonly name="hra" id="hra" value="{{ old('hra') }}"
                                            placeholder="Enter HRA(15%)">
                                        @error('hra')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance (5% of Basic Salary)</label>
                                        <input class="form-control @error('conveyance') is-invalid @enderror"
                                            type="number" readonly name="conveyance" id="conveyance"
                                            value="{{ old('conveyance') }}" placeholder="Enter conveyance">
                                        @error('conveyance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Allowance(15% Of Basic Salary)</label>
                                        <input class="form-control @error('allowance') is-invalid @enderror"
                                            type="number" readonly name="allowance" id="allowance"
                                            value="{{ old('allowance') }}" placeholder="Enter allowance">
                                        @error('allowance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Medical Allowance (5% of Basic Salary)</label>
                                        <input class="form-control @error('medical_allowance') is-invalid @enderror"
                                            type="number" readonly name="medical_allowance" id="medical_allowance"
                                            value="{{ old('medical_allowance') }}"
                                            placeholder="Enter medical  allowance">
                                        @error('medical_allowance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone And Internet Reimbursement</label>
                                        <input class="form-control @error('medical_allowance') is-invalid @enderror"
                                            type="number" name="tel_int" id="tel_int"
                                            value="{{ old('medical_allowance') }}"
                                            placeholder="Enter medical  allowance">
                                        @error('medical_allowance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Work From Home</label>
                                        <input class="form-control @error('prof_tax') is-invalid @enderror" type="number"
                                            name="wfh" id="wfh" value="{{ old('wfh') }}"
                                            placeholder="Enter Work From Home Days.">
                                        @error('wfh')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Work in Holidays(Days).</label>
                                        <input class="form-control @error('prof_tax') is-invalid @enderror"
                                            type="number" name="work_in_holidays_days" id="work_in_holidays_days"
                                            value="{{ old('work_in_holidays') }}" placeholder="Enter Work In Holidays.">
                                        @error('work_in_holidays')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Work in Holidays(Hours).</label>
                                        <input class="form-control @error('prof_tax') is-invalid @enderror"
                                            type="number" name="work_in_holidays_hours" id="work_in_holidays_hours"
                                            value="{{ old('work_in_holidays') }}" placeholder="Enter Work In Holidays.">
                                        @error('work_in_holidays')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control @error('tds') is-invalid @enderror" type="number"
                                            name="tds" id="tds" value="{{ old('tds') }}"
                                            placeholder="Enter TDS">
                                        @error('tds')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>ESI - (Employee Contribution (3.25% ) +
                                            Employer Contribution (0.75%) below 21000 gross salary)</label>
                                        <input class="form-control @error('esi') is-invalid @enderror" readonly
                                            type="number" name="esi" id="esi" value="{{ old('esi') }}"
                                            placeholder="Enter ESI">
                                        @error('esi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>PF - (Employee Contribution (12%) +
                                            Employer Contribution (12%) )</label>
                                        <input class="form-control @error('pf') is-invalid @enderror" readonly
                                            type="number" name="pf" id="pf" value="{{ old('pf') }}"
                                            placeholder="Enter PF">
                                        @error('pf')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Leaves(1 Short Leave = 0.25, 1 Half Day = 0.5) </label>
                                        <input class="form-control @error('leave') is-invalid @enderror" type="text"
                                            name="leave" id="leave" value="{{ old('leave') }}"
                                            placeholder="Enter leave">
                                        @error('leave')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Home Loan</label>
                                        <input class="form-control @error('labour_welfare') is-invalid @enderror"
                                            type="number" name="labour_welfare" id="labour_welfare"
                                            value="{{ old('labour_welfare') }}" placeholder="Enter Loan">
                                        @error('labour_welfare')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Salary Modal -->

        <!-- Edit Salary Modal -->
        <div id="edit_salary" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Staff Salary</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form/salary/update') }}" method="POST">
                            @csrf
                            <input class="form-control" type="hidden" name="id" id="e_id" value=""
                                readonly>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name of Employee</label>
                                        <input class="form-control " type="text" name="name" id="e_name"
                                            value="" readonly>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>CTC</label>
                                    <input class="form-control @error('salary') is-invalid @enderror" readonly
                                        type="text" name="salary" id="e_salary" value="{{ old('salary') }}"
                                        placeholder="Enter net salary">
                                    {{-- <input class="form-control" type="text" name="salary" id="e_salary" value=""> --}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Earnings</h4>
                                    <div class="form-group">
                                        <label>Basic</label>
                                        <input class="form-control" type="text" name="basic" id="e_basic"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>DA(40%)</label>
                                        <input class="form-control" type="text" name="da" id="e_da"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>HRA(15%)</label>
                                        <input class="form-control" type="text" name="hra" id="e_hra"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Conveyance</label>
                                        <input class="form-control" type="text" name="conveyance" id="e_conveyance"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Allowance</label>
                                        <input class="form-control" type="text" name="allowance" id="e_allowance"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Medical Allowance</label>
                                        <input class="form-control" type="text" name="medical_allowance"
                                            id="e_medical_allowance" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone And Internet Reimbursement</label>
                                        <input class="form-control" type="text" name="tel_int" id="e_tel_int"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Work From Home</label>
                                        <input class="form-control" type="text" name="wfh" id="e_wfh"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Work In Holidays(Days)</label>
                                        <input class="form-control" type="text" name="work_in_holidays_days"
                                            id="e_work_in_holidays_days" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Work In Holidays(Hours)</label>
                                        <input class="form-control" type="text" name="work_in_holidays_hours"
                                            id="e_work_in_holidays_hours" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="text-primary">Deductions</h4>
                                    <div class="form-group">
                                        <label>TDS</label>
                                        <input class="form-control" type="text" name="tds" id="e_tds"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>ESI - 3.25% employer, 0.75% employee (below 21000 gross salary)</label>
                                        <input class="form-control" type="text" name="esi" id="e_esi"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>PF</label>
                                        <input class="form-control" type="text" name="pf" id="e_pf"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Leave</label>
                                        <input class="form-control" type="text" name="leave" id="e_leave"
                                            value="">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Prof. Tax</label>
                                        <input class="form-control" type="text" name="prof_tax" id="e_prof_tax" value="">
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Home Loan</label>
                                        <input class="form-control" type="text" name="labour_welfare"
                                            id="e_labour_welfare" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-primary submit-btn">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Edit Salary Modal -->

        <!-- Delete Salary Modal -->
        <div class="modal custom-modal fade" id="delete_salary" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Salary</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <form action="{{ route('form/salary/delete') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" name="id" class="e_id" value="">
                                        <button type="submit"
                                            class="btn btn-primary continue-btn submit-btn">Delete</button>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal"
                                            class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Delete Salary Modal -->

    </div>
    <!-- /Page Wrapper -->
@section('script')
    <script>
        $(document).ready(function() {
            $('.select2s-hidden-accessible').select2({
                closeOnSelect: false
            });
            $("#tel_int").val('0');
        });
    </script>
    <script>
        // select auto id and email
        $('#name').on('change', function() {
            $('#employee_id').val($(this).find(':selected').data('employee_id'));
        });
    </script>
    {{-- update js --}}
    <script>
        $(document).on('click', '.userSalary', function() {
            var _this = $(this).parents('tr');
            $('#e_id').val(_this.find('.id').text());
            $('#e_name').val(_this.find('.name').text());
            $('#e_salary').val(_this.find('.salary').text());
            $('#e_basic').val(_this.find('.basic').text());
            $('#e_da').val(_this.find('.da').text());
            $('#e_hra').val(_this.find('.hra').text());
            $('#e_conveyance').val(_this.find('.conveyance').text());
            $('#e_allowance').val(_this.find('.allowance').text());
            $('#e_medical_allowance').val(_this.find('.medical_allowance').text());
            $('#e_tds').val(_this.find('.tds').text());
            $('#e_esi').val(_this.find('.esi').text());
            $('#e_pf').val(_this.find('.pf').text());
            $('#e_leave').val(_this.find('.leave').text());
            $('#e_prof_tax').val(_this.find('.prof_tax').text());
            $('#e_tel_int').val(_this.find('.tel_int').text());
            $('#e_wfh').val(_this.find('.wfh').text());
            $('#e_work_in_holidays_hours').val(_this.find('.work_in_holidays_hours').text());
            $('#e_work_in_holidays_days').val(_this.find('.work_in_holidays_days').text());
            $('#e_labour_welfare').val(_this.find('.labour_welfare').text());
        });
    </script>

    <script>
        $(document).on('change', '#salary, #e_salary', function() {

            var ctc = parseInt($(this).val());

            var base_salary = parseInt(40);
            var basic_sal = (ctc * base_salary / 100);

            var hra = parseInt(40);
            var hra = (basic_sal * hra / 100);

            var da_per = parseInt(20);
            var da = (basic_sal * da_per / 100);

            var lta_per = parseInt(15);
            var lta = (basic_sal * lta_per / 100);

            var conveyance_per = parseInt(5);
            var conveyance = (basic_sal * conveyance_per / 100);

            var med_conveyance_per = parseInt(5);
            var med_conveyance = (basic_sal * med_conveyance_per / 100);



            if (ctc >= parseInt(15000)) {
                $("#pf, #e_pf").val('3600');
            } else {
                $("#pf, #e_pf").val((ctc * parseInt(24) / 100));
            }

            if (ctc > parseInt(21000)) {
                $("#esi, #e_esi").val(0);
            } else {
                $("#esi, #e_esi").val((ctc * parseInt(4) / 100));
            }



            $('#basic, #e_basic').val(basic_sal);
            $('#hra, #e_hra').val(hra);
            $('#conveyance, #e_conveyance').val(conveyance);
            $('#medical_allowance, #e_medical_allowance').val(med_conveyance);
            $('#da, #e_da').val(da);
            $('#allowance, #e_allowance').val(lta);

        });
    </script>
    {{-- delete js --}}
    <script>
        $(document).on('click', '.salaryDelete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>

    <script>
        $(document).ready(function() {
            $("input[type=number], #leave").prop('disabled', true);

        });

        $("#name").on('change', function() {
            if ($(this).val() != '') {
                $("input[type=number], #leave").prop('disabled', false);
            } else {
                $("input[type=number], #leave").prop('disabled', true);
            }
        })
    </script>

    <script>
        $('#name').on('change', function() {
            var id = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ url('get_salary') }}" + '/' + id,


                success: function(response) {
                    $("#salary").val(response[0].ctc);
                    var ctc = parseInt(response[0].ctc);

                    var base_salary = parseInt(40);
                    var basic_sal = (ctc * base_salary / 100);

                    var hra = parseInt(40);
                    var hra = (basic_sal * hra / 100);

                    var da_per = parseInt(20);
                    var da = (basic_sal * da_per / 100);

                    var lta_per = parseInt(15);
                    var lta = (basic_sal * lta_per / 100);

                    var conveyance_per = parseInt(5);
                    var conveyance = (basic_sal * conveyance_per / 100);

                    var med_conveyance_per = parseInt(5);
                    var med_conveyance = (basic_sal * med_conveyance_per / 100);



                    if (ctc >= parseInt(15000)) {
                        $("#pf, #e_pf").val('3600');
                    } else {
                        $("#pf, #e_pf").val((ctc * parseInt(24) / 100));
                    }

                    if (ctc > parseInt(21000)) {
                        $("#esi, #e_esi").val(0);
                    } else {
                        $("#esi, #e_esi").val((ctc * parseInt(4) / 100));
                    }



                    $('#basic, #e_basic').val(basic_sal);
                    $('#hra, #e_hra').val(hra);
                    $('#conveyance, #e_conveyance').val(conveyance);
                    $('#medical_allowance, #e_medical_allowance').val(med_conveyance);
                    $('#da, #e_da').val(da);
                    $('#allowance, #e_allowance').val(lta);
                }
            });
        });
    </script>
@endsection
@endsection
