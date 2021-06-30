      <div class="row" ng-repeat="x in candidatedetails">
                                                                
                                                                    <hr>
                                                                    <div class="col-md-4">
                                                                        <ul class="list-unstyled">
                                                                          <li> <a href="" class="name" ng-click="candidateshow(x.id)">
                    
                    {{x.candidateName}}
                  </a></li>
                                                                            <li>{{x.currentDesignation}}</li>
                                                                            <li>Email-{{x.email}}</li>
                                                                            <li>Qualification:{{x.qualification}}</li>
                                                                        </ul>

                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <ul class="list-unstyled">
                                                                             <li>city- {{x.city}}</li>
                                                                            <li>Contact number: {{x.phoneNo}}</li>
                                                                            <li>Exp: {{x.relevantExperiance}} year</li>
                                                                            <li></li>
                                                                        </ul>
                                                                    </div>
                                                                     <div class="col-md-4">
              <div class="checkbox">
                  <label><input type="checkbox" ng-model="x.selected" value=""> <span ng-hide="ishidereference">Reference</span></label>
                 </div>
                                                                         
                                                                         <a href="javascript:" ng-hide="ishidecomment"  ng-click="comment()" >
                <i class="fa fa-files-o fa-lg"></i></a> 
              
                     </div>

                                                              
                                                           

                                                                 
                                                            </div>