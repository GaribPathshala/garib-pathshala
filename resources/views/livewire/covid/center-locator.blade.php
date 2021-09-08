<div class="container pt-5">
    
    <form wire:submit.prevent="submit" wire:init="loadStates">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span wire:submit class="input-group-text" > Search By </span>
                    </div>
                    <select wire:model="form.search_by" class="form-control" id="search_by">
                        <option value="postal_code">Postal Code</option>
                        <option value="district">State & District</option>
                    </select>
                </div>

                <div class="row">

                    @if ($form['search_by'] == 'postal_code')
                    <div class="col-8 pr-0">
                        <div class="form-group">
                            <input type="text" class="form-control @error('form.postal_code') is-invalid @enderror" wire:model="form.postal_code" id="postal_code" placeholder="Enter Your Postal Code...">
                            @error('form.postal_code')
                            <span class="invalid-feedback"> 
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endif

                    @if ($form['search_by'] == 'district')
                    <div class="col-4" >
                        <div class="input-group mb-3">
                            <select class="form-control @error('form.state_id') is-invalid @enderror" wire:model="form.state_id">
                                <option value="" disabled selected>Select State..</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state['state_id'] }}">{{ $state['state_name'] }}</option>
                                @endforeach
                            </select>
                            @error('form.state_id') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <select class="form-control @error('form.district_id') is-invalid @enderror" wire:model="form.district_id">
                                <option value="" disabled selected>Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->district_id ?? $district['district_id'] }}">{{ $district->district_name ?? $district['district_name'] }}</option>
                                @endforeach
                            </select>
                            @error('form.district_id') 
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @endif

                    <div class="col-4 ">
                        <button wire:submit class="btn btn-primary btn-block"> Search 
                            <span wire:loading wire:target="submit" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
                            <i wire:loading.remove wire:target="submit" class="fas fa-search" ></i> 
                        </button>    
                    </div>

                </div>

    </form>



@if ($remark == 'no_center' || $remark == 'center_available')


    

    <div class="mt-4 center-result-area" style="height: 550px; overflow: auto;">

        <table class="w-100 covid-vaccine" style="border-collapse: collapse;" > 

            <tr class="covid-date-tr" style="position: sticky; top: 0; background-color: white; z-index: 1;" >
                <td style="width: 23%; "></td>
                @php $dateCounter = 0; @endphp
                @while ($dateCounter < 7)
                <td class="text-center" style="font-size: 9px;">
                    <div class="input-group" style="height: unset !important;">
                        @if ($dateCounter == 0)
                        <div class="input-group-prepend">
                            <button wire:click="decreaseSearchDate" class="btn btn-secondary btn-sm" type="button">
                                <i wire:loading.remove wire:target="decreaseSearchDate" class="fas fa-arrow-left"></i>
                            <span wire:loading wire:target="decreaseSearchDate" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
                            </button>
                            
                        </div>
                        @endif
                        
                        <span class="btn btn-sm btn-outline-secondary " style="margin: auto;" >{{ date('d M', strtotime($searchDate . ' +'.$dateCounter.' day')) }}</span>
                          
                        @if ($dateCounter == 6)
                        <div class="input-group-append">
                            <button wire:click="increaseSearchDate" class="btn btn-secondary btn-sm" type="button">
                                <i wire:loading.remove wire:target="increaseSearchDate" class="fas fa-arrow-right"></i>
                                <span wire:loading wire:target="increaseSearchDate" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
                            </button>
                        </div>
                        @endif
                    </div>
                </td>
                @php $dateCounter++ @endphp
                @endwhile
                @php $dateCounter = 0 @endphp
            </tr>



            @if ($remark == 'center_available')
            
            @foreach ($centers as $center)
                <tr class="" style="border-bottom: 1px solid #e7e7e7;">
                    <td class="" style="width: 11%; padding: 10px 0; padding-right: 15px;">
                        <span style="font-size: 14px; color: #002060;" class="">{{ $center->name }} 
                            @if ($center->fee_type == 'Paid')
                                <span class="" style="background: #2152b3; font-size: 9px; padding: 2px 5px; margin-left: 3px; color: #fff; font-weight: 600; border-radius: 20px;">PAID</span>
                            @endif
                        </span>
                        <div style="font-size: 14px; color: #998fa2" > 
                            {{ $center->address }}, 
                            {{ $center->district_name }}, 
                            {{ $center->state_name }}, 
                            {{ $center->pincode }}
                        </div>
                    </td>
                    
                    @php
                        $centerSessions = collect($center->sessions)->groupBy('date');
                    @endphp

                    @while ($dateCounter < 7)
                    @php
                        $slotsAvailable = false;
                    @endphp
                        <td style="width: 11%; padding: 10px 5px;" class="text-center">
                            <div style="height: 100%">
                            @foreach ($centerSessions as $dateKey => $centerSession)
                                @if (date('d-m-Y', strtotime($searchDate . ' +'.$dateCounter.' day')) == $dateKey)
                                    @php
                                        $slotsAvailable = true;
                                    @endphp
                                    @foreach ($centerSession as $session)
                                    <div class="container mt-2" >
                                        

                                        <div style="font-size: 12px;" class="row">
                                            <div class="col-12">
                                                <span style="font-weight: 700;" class="text-secondary">{{ $session->vaccine }}</span>
                                            </div>
                                        </div>

                                        @if ($session->available_capacity_dose1 + $session->available_capacity_dose2 < 1)
                                            <span class="badge badge-pill badge-danger">Booked</span>
                                        @else 
                                            <div class="row" style="font-size: 12px; border: 1px solid #ccc;" >
                                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                                    <span>D1<br>{{ $session->available_capacity_dose1 }}</span>
                                                </div>
                                                <div class="col-md-4 d-flex justify-content-center align-items-center"  style="background-color: #a9d18e">
                                                    <span>{{ $session->available_capacity_dose1 + $session->available_capacity_dose2 }}</span>
                                                </div>
                                                <div class="col-md  -4 d-flex justify-content-center align-items-center">
                                                    <span>D2<br>{{ $session->available_capacity_dose2 }}</span>
                                                </div>
                                            </div>
                                            @if ($session->min_age_limit == 18 && $session->allow_all_age == true)
                                            <div class="text-danger" style="font-size: 11px; font-weight: 600;">18 & Above</div>
                                            @elseif ($session->min_age_limit == 45)
                                            <div class="text-danger" style="font-size: 11px; font-weight: 600;">45 & Above</div>
                                            @elseif ($session->min_age_limit == 18 && $session->allow_all_age == false)
                                            <div class="text-danger" style="font-size: 11px; font-weight: 600;">18-44 Only</div>
                                            @else 
                                            <div class="text-danger" style="font-size: 11px; font-weight: 600;">Unknown Age</div>
                                            @endif
                                            
                                        @endif

                                       
                                    </div>
                                   

                                    @endforeach
                                @endif
                            @endforeach

                            @if (!$slotsAvailable)
                            
                            <h6 class="mt-4"><span style="font-size: 12px;" class="badge badge-pill badge-secondary">No SLots</span></h6>
                            @endif     
                            </div>               
                        </td>    
                    @php $dateCounter++ @endphp     
                    @endwhile
                    @php $dateCounter = 0 @endphp 

                </tr>
            @endforeach

            @endif
    
       


            </table>

            
            @if ($remark == 'no_center') 
                <div >
                    <div class="alert alert-danger mt-3" role="alert">
                        <strong>No centers found.</strong>
                    </div>
                </div>
            @endif

        </div>
  
 
@endif

    
</div>