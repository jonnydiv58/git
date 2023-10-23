<div class="table-responsive position-relative">
                                     <div class="checkboxes">
                                       <div class="form-group">
                                            <input type="checkbox" id="assign_to" >
                                            <label>Assign to</label>
                                       </div>
                                       <div class="form-group">
                                            <input type="checkbox" id="location">
                                            <label>Location</label>
                                       </div>
                                        
                                    </div>
                                    <table class="table table-striped custom-table mb-0 text-center mt-5" id="datatable">
                                        
                                        <thead>
                                            <tr>
                                                <th style="width: 30px;">#</th>
                                                <th>Item</th>
                                                <th>Amount</th>
                                                <th>Serial No</th>
                                                <th>Assign to</th>
                                                <th class="location" style="display: none;">Location</th>
                                                <th>Brand</th>
                                                <th>Remark</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                <?php
                $s = 1;
                $inventory_sql = Other::find_by_order();
                foreach($inventory_sql as $data){
                    $employee_data = Employee::find_by_id($data->assign_to);
                    
                    $location = Location::find_by_id($data->location);
                ?>                     
                                            <tr style ="<?php if($data->status == 1){ echo "background:#f4511e !important;color:#fff;"; } ?>">
                                                <td><?php echo $s; ?></td>
                                                <td><?php echo $data->item; ?></td>
                                                <td><?php echo number_format($data->amount); ?></td>
                                                <td><?php echo $data->serial_no ?></td>
                                                <td>
                                                     <?php echo $employee_data->name; ?> 
                                                     <span class="employee-id" style="display: none;"><?php echo $employee_data->employee_id; ?></span>
                                                </td>
                                                <td  class="location" style="display: none;"><?php echo $location->location; ?></td>
                                                <td class="<?php if($data->status == 1){ echo "text-white";}else {echo "text-danger";} ?>"><?php echo $data->brand ?></td>
                                                
                                             <td><?php echo $data->remark ?></td>
                                               <td class="text-end">
                                                    <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item edit_laptop" id="<?php echo $data->id ?>" href="#" data-bs-toggle="modal" data-bs-target="#edit_laptop"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <?php
                                                if($data->status == 0){
                                                ?>            
                                                        <a class="dropdown-item inventory_status" href="#" id="<?php echo $data->id ?>"> <i class="fa fa-dot-circle-o text-danger"></i></i> No Use</a>    
                                                <?php }else{ ?>     
                                                            <a class="dropdown-item use_status" href="#" id="<?php echo $data->id ?>"> <i class="fa fa-dot-circle-o text-success"></i> Use</a>
                                                <?php } ?> 
                                                  
                                                <a class="dropdown-item view_invoice" href="#" data-bs-toggle="modal" data-bs-target="#view_invoice"id="<?php echo $data->id ?>"> <i class="fa fa-dot-circle-o text-info"> </i> Invoice</a>
                                                    
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                <?php $s++; }  ?>                         
                                         </tbody>
                                    </table>
                                </div>