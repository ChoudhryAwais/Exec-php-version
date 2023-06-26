<?php
 require "profileinfo.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Form</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/responsive.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" type="text/css" href="css/print.css?v=<?php echo time(); ?>" media="print">
  <link rel="shortcut icon" type="image/x-icon" href="pics/t1.png">
</head>
<body>    
  <div class="text-center mt-3 mb-3">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>
   
  <div class="row mt-1 wholetop" style="background-color: #323E6F">
    <div class="col-lg-1 topblank1"></div>
  
    <div class="col-lg-3 font-weight-bold text-white mt-4 printadform" style="font-size: 30px;">
      <p>STUDENT FORM</p>
    </div>
    <div class="col-lg-4 topblank2"></div>
    <div class="col-lg-3 printlogo" style="background-color: white;border-radius: 0px;">
      <img src="<?php echo $Logo?>" width="100%" height="80px">
    </div>
    
    <div class="col-lg-1 topblank3"></div>
  </div>
  <div class="row mt-1">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10">
      <form class="form-group form1 mb-4" id="subj" method="post" action="submit.php">
        <hr>
        <div class="mt-3 row border border-dark"></div>
        <div class="text-uppercase text-white font-weight-bold" style="font-size: 16px;">
          <div class="row p-2">
            <div class="col-xl-9 col-sm-9">
                <div class="row mt-1">
                    <div class="col-xl-3 col-sm-3">
                        <div style=";text-align: center;color:black">
                            Inquiry No.
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                        
                        </p>
                    </div>
                    <div class="col-xl-6 col-sm-6"></div>
                    <div class="col-xl-3 col-sm-3">
                        <div style=";text-align: center;color:black">
                            Form No.
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                            
                        </p>  
                    </div>
                    
                </div>
                <div class="row mt-1">
                    <div class="col-lg-4 col-sm-3"></div>
                    <div class="col-lg-4 col-sm-6"  style="background-color:#323E6F;text-align: center;font-size: 18px">
                    Academic Information
                    </div>
                    <div class="col-lg-4 col-sm-3"  ></div>
                </div>
                <div class="row mt-2">
                
                    <div class="col-xl-3 col-sm-3">
                        <div style=";text-align: center;color:black">
                            class
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                            
                        </p>
                    </div>
                    <div class="col-xl-3 col-sm-3">
                        <div style=";text-align: center;color:black">
                            Group
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                        
                        </p>
                    </div>
                    <div class="col-xl-2 col-sm-2">
                        <div style=";text-align: center;color:black">
                            Batch
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                        
                        </p>
                    </div>
                    <div class="col-xl-4 col-sm-4">
                        <div style=";text-align: center;color:black">
                            Board/University
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                        
                        </p>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-xl-3 col-sm-3">
                        <div style=";text-align: center;color:black">
                            Status
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                        
                        </p>
                    </div>
                    <div class="col-xl-9 col-sm-9">
                        <div style=";text-align: center;color:black">
                            Subjects
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                            
                        </p>  
                    </div>
                    
                </div>
                <div class="row mt-1">
                    <div class="col-xl-3 col-sm-3">
                        <div style=";text-align: center;color:black">
                            No. of subjects
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                        
                        </p>
                    </div>
                    <div class="col-xl-9 col-sm-9">
                        <div style=";text-align: center;color:black">
                            Form Submission Date
                        </div>
                        <p class="text-center border" style="color:black;font-size:15px;height:25px">
                            
                        </p>  
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-3">
                <div class="row">
                    <div class="col-xl-12 col-sm-12 text-center">
                        <div style="width:192px;height:192px;font-size:12px" class="border border-dark ml-2 text-dark p-5">
                            Photograph<br>
                            (Passport Size)
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-sm-12 pl-4 text-dark pt-2" style="font-size:9px">
                        <input type="checkbox" ><span class="pl-1">2 Passport Size Photographs</span><br><br>
                        <input type="checkbox" ><span class="pl-1">A Copy of Latest Result Card</span><br><br>
                        <input type="checkbox" ><span class="pl-1">A Copy of CNIC/B-Form of Student</span><br><br>
                        <input type="checkbox" ><span class="pl-1">A Copy of CNIC of Parent/Guardian</span>
                    </div>
                </div>
            </div>
          </div>
          <div class="mt-2 row border border-dark"></div>
          <div class="row mt-1">
            <div class="col-lg-4 col-sm-4"  ></div>
            <div class="col-lg-4 col-sm-4"  style="background-color:#323E6F;text-align: center;font-size: 18px">Student's information</div>
            <div class="col-lg-4 col-sm-4"  ></div>
          </div>
          <div class="row mt-3"  style="font-size: 15px;">
            <div class="col-lg-12 col-sm-12 snamec">
              <div class="row p-3" style="color:black">
                <div class="col-xl-2 col-sm-2 border">First Name :<br><span style="font-size: 12px" class="font-weight-normal">(Block Letters)</span></div>
                <div class="col-xl-10 col-sm-10 border border-dark border-left-0 border-right-0 border-top-0">
                  <table class="table table-bordered">
                    <tr>
                      <th class="border border-dark"></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row"  style="font-size: 15px;">
            <div class="col-lg-12 col-sm-12 snamec">
              <div class="row p-3" style="color:black">
                <div class="col-xl-2 col-sm-2 border">Last Name :<br><span style="font-size: 12px" class="font-weight-normal">(Block Letters)</span></div>
                <div class="col-xl-10 col-sm-10 border border-dark border-left-0 border-right-0 border-top-0">
                  <table class="table table-bordered">
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="font-size: 15px;">
            <div class="col-lg-5 col-sm-5 genderc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-4 col-sm-4 border pt-1">Gender :</div>
                <div class="col-xl-8 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0">
                  <table class="table table-bordered">
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-sm-7 religionc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-3 col-sm-3 border">Religion :</div>
                <div class="col-xl-9 col-sm-9 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
          
          <div class="row mt-1" style="font-size: 15px;">
            <div class="col-lg-5 col-sm-5 dobc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-3 col-sm-3 border">D.O.B :<br><span style="font-size: 12px" class="font-weight-normal pl-0">(mm/dd/yy)</span></div>
                <div class="col-xl-9 col-sm-9 border border-dark border-left-0 border-right-0 border-top-0">
                  <table class="table table-bordered">
                    <tr>
                      <th></th>
                      <th></th>
                      <th class="pl-4">-</th>
                      <th></th>
                      <th></th>
                      <th class="pl-4">-</th>
                      <th></th>
                      <th></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-sm-7 cnicc">
             <div class="row p-3" style="color:black">
                <div class="col-xl-2 col-sm-2 border">CNIC :<br><span style="font-size: 12px" class="font-weight-normal">(B-Form)</span></div>
                <div class="col-xl-10 col-sm-10 border border-dark border-left-0 border-right-0 border-top-0">
                  <table class="table table-bordered">
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="pl-4">-</th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th class="pl-4">-</th>
                      <th></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="font-size: 15px;">
            <div class="col-lg-6 col-sm-6 religionc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-4 col-sm-4 border">Domicile :</div>
                <div class="col-xl-8 col-sm-8 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6 nationalityc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-4 col-sm-4 border">Nationality :</div>
                <div class="col-xl-8 col-sm-8 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
          <div class="row mt-1" style="font-size: 15px;">
            <div class="col-lg-12 col-sm-12 addressc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-2 col-sm-2 border">Address :</div>
                <div class="col-xl-10 col-sm-10 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            
          </div>
          <div class="row mt-1" style="font-size: 15px;">
            <div class="col-lg-4 phonec">
              <div class="row p-3" style="color:black">
                <div class="col-xl-4 col-sm-5 border">Phone :</div>
                <div class="col-xl-8 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-3 cellc">
             <div class="row p-3" style="color:black">
                <div class="col-xl-4 col-sm-4 border">Cell :</div>
                <div class="col-xl-8 col-sm-8 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-5 emailc">
              <div class="row p-3" style="color:black">
                <div class="col-xl-3 col-sm-3 border">Email :</div>
                <div class="col-xl-9 col-sm-9 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
          <div class="mt-2 row border border-dark"></div>
          <div class="row mt-1">
            <div class="col-lg-4 col-sm-4"  ></div>
            <div class="col-lg-4 col-sm-4"  style="background-color:#323E6F;font-size: 18px;text-align: center;">Parents information</div>
            <div class="col-lg-4 col-sm-4"  ></div>
          </div>
          
          <div class="row mt-3"  style="font-size: 15px;">
            <div class="col-lg-12 col-sm-12">
              <div class="row p-3" style="color:black">
                <div class="col-xl-2 col-sm-2 border">Parent Name :<br><span style="font-size: 12px" class="font-weight-normal">(Block Letters)</span></div>
                <div class="col-xl-10 col-sm-10 border border-dark border-left-0 border-right-0 border-top-0">
                  <table class="table table-bordered">
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <div class="row"  style="font-size: 15px;">
            <div class="col-lg-5 col-sm-5">
              <div class="row  p-3" style="color:black">
                <div class="col-xl-4 col-sm-4 border">Relation :</div>
                <div class="col-xl-8 col-sm-8 border border-dark border-left-0 border-right-0 border-top-0">
                  
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-sm-7 cnicc">
              <div class="row  p-3" style="color:black">
                <div class="col-xl-4 col-sm-4 border">Phone/Cell No. :</div>
                <div class="col-xl-8 col-sm-8 border border-dark border-left-0 border-right-0 border-top-0">
                  
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-1" style="font-size: 15px;">
            
            <div class="col-lg-6 col-sm-6">
              <div class="row p-3" style="color:black">
                <div class="col-xl-5 col-sm-5 border">Occupation/Job :</div>
                <div class="col-xl-7 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-6">
              <div class="row p-3" style="color:black">
                <div class="col-xl-4 col-sm-5 border">Organization :</div>
                <div class="col-xl-8 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
          <p style="page-break-after:  always;"></p>







<!-- Page break -->

          
          <div class="row mt-3">
            <div class="col-lg-4 col-sm-4"  ></div>
            <div class="col-lg-4 col-sm-4"  style="background-color:#323E6F;font-size: 18px;text-align: center;">
              Regulation
            </div>
            <div class="col-lg-4 col-sm-4"  ></div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-sm-12 p-2 border p-3 text-capitalize" style="color:black;font-size: 13px">
              1.  Dues once paid are neither refundable nor adjustable, in any case.<br>
              2.  Session timings are subject to the availability of the teachers and can be amended if required.<br>
              3.  Parents must attend the office regularly to discuss progress of the student.<br>
              4.  A fine on daily basis will be charged if tuition fee or any other charges are paid after the due date.<br>
              5.  Misconduct with any teacher or student will be culpable.<br>
              6.  Any damage caused by the student will be charged accordingly.<br>
              7.  Institution will not, in any case, be responsible for any loss suffered by a student.<br>
              8.  Use of mobile phone is strictly prohibited with in campus premises.<br>
              9.  Decision of the administration will be final, in any case<br>
              10. Morally presentable dress code is to be observed.
              <div class="row">
                <div class="col-lg-8 col-sm-7"></div>
                <div class="col-lg-4 col-sm-5 text-white" style="background-color:#323E6F">Note: The Academy premises is a non-smoking zone</div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-lg-4 col-sm-4"  ></div>
            <div class="col-lg-4 col-sm-4"  style="background-color:#323E6F;font-size: 18px;text-align: center;">
              Declaration
            </div>
            <div class="col-lg-4 col-sm-4"  ></div>
          </div>
          <div class="row">
            <div class="col-xl-12 col-sm-12 p-2 border p-3 text-capitalize" style="color:black;font-size: 13px">
              I hereby certify that the information given here is authentic to the best of my knowledge and belief.<br>
              I understand that i will abide by all present rules and regulations of the institute and those to be implemented in future.<br>
              I acknowledge that the administration reserves the right to dismiss students and return them home,without any refund of fees for<br>
              violating the rules of institute or under such other conditions.<br>
              I, therefore, agree to uphold all the rules and regulations, and cooperate with administration and teachers.<br>

              <div class="mt-5 row m-2">
                <div class="col-lg-3 col-sm-3" style="border:1px solid black"></div>
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-3 col-sm-3" style="border:1px solid black"></div>
              </div>
              <div class="row ml-2">
                <div class="col-lg-3 col-sm-3">Signature of Parents/Guardian</div>
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-3 col-sm-3"></div>
                <div class="col-lg-3 col-sm-3">Signature of student</div>
              </div>
            </div>
          </div>

          <div class="mt-5 row border border-dark"></div>
          <div class="row mt-4">
            <div class="col-lg-2 col-sm-2"  ></div>
            <div class="col-xl-2 col-sm-2 feedetailc border border-top-0 border-bottom-0" style="background-color:#323E6F;font-size: 18px;text-align: center;">Payable Fee</div>
            <div class="col-lg-2 col-sm-2"  ></div>
            <div class="col-lg-2 col-sm-2"  ></div>
            <div class="col-xl-2 col-sm-2 feedetailc border border-top-0 border-bottom-0" style="background-color:#323E6F;font-size: 18px;text-align: center;">Comments</div>
            <div class="col-lg-2 col-sm-2"  ></div>
          </div>
          <div class="row mt-4"> 
            <div class="col-lg-2 col-sm-2">
              <div style=";text-align: center;color:black">
                Admission Fee
              </div>
              <p class="text-center border" style="color:black;font-size:15px;height:25px">
               
              </p>
            </div>
            <div class="col-lg-2 col-sm-2 ">
              <div style=";text-align: center;color:black">
                Tuition Fee
              </div>
              <p class="text-center border" style="color:black;font-size:15px;height:25px">
                
              </p>
            </div>
            <div class="col-lg-2 col-sm-2">
              <div style=";text-align: center;color:black">
                Total Fee
              </div>
              <p class="text-center border" style="color:black;font-size:15px;height:25px">
                
              </p>
            </div>
            <div class="col-lg-6 col-sm-6">
              
              <p class="text-center border" style="color:black;font-size:15px;height:50px">
                
              </p>
            </div>
          </div>
          <div class="mt-2 row border border-dark"></div>
          <div class="row mt-1">
            <div class="col-lg-4 col-sm-4"  ></div>
            <div class="col-lg-4 col-sm-4"  style="background-color:#323E6F;font-size: 18px;text-align: center;">
              For Office Use
            </div>
            <div class="col-lg-4 col-sm-4"  ></div>
          </div>
          <div class="row mt-3"  style="font-size: 15px;">
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-5 col-sm-6">Student ID :</div>
                <div class="col-xl-7 col-sm-6 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-5 col-sm-5">Campus :</div>
                <div class="col-xl-7 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-5 col-sm-5">Session :</div>
                <div class="col-xl-7 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
          <div class="row"  style="font-size: 15px;">
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-5 col-sm-6">Total Fee :</div>
                <div class="col-xl-7 col-sm-6 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-6 col-sm-7">Vide Receipt No :</div>
                <div class="col-xl-6 col-sm-5 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-5 col-sm-5">Recevied :</div>
                <div class="col-xl-7 col-sm-7 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
          <div class="row"  style="font-size: 15px;">
            <div class="col-lg-4 col-sm-4">
              <div class="row p-3 text-dark">
                <div class="col-xl-5 col-sm-6">Balance :</div>
                <div class="col-xl-7 col-sm-6 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            <div class="col-lg-8 col-sm-8">
              <div class="row p-3 text-dark">
                <div class="col-xl-3 col-sm-3">Due Date :</div>
                <div class="col-xl-9 col-sm-9 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
            
          </div>
          <div class="row"  style="font-size: 15px;">
            <div class="col-lg-12 col-sm-12">
              <div class="row p-3 text-dark">
                <div class="col-xl-2 col-sm-2">Remarks :</div>
                <div class="col-xl-10 col-sm-10 border border-dark border-left-0 border-right-0 border-top-0"></div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-1"></div>
  </div>
  <footer style="background-color:#323E6F;margin-top:14.5%" class="m-5">
    <div class="row">
      <div class="col-xl-12 footer1c">
        <div class="h2 bg-white border p-2 font-weight-bold text-center" style="color:#586261;border-radius: 0px;">
          <?php echo $InstitudeName.' '.$CampusName ?>
        </div>
        <div class="row text-center">
          <div class="col-xl-12">
            <span class="text-white text-center">
              <span class="h7 font-weight-bold">Address</span> : <?php echo ucwords($InstitudeAddress) ?>
            </span>
          </div>
        </div>  
        <div class="row text-center">
          <div class="col-xl-12">
            <span class="text-white text-center">
              <span class="h7 font-weight-bold">Contact us on</span> : <?php echo $InstitudeAddmissionNum.' / '.$InstitudeAccountsNum ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="text-center mt-3 mb-3">
    <button class="btn btn-lg btn-info pl-5 pr-5" id="print-btn" onclick="window.print();">Print</button>
  </div>

</body>
</html>