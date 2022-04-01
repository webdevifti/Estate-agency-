@extends('admin.layouts.master')
@section('content')
<div class="content pt-5">
<div class="mx-n6 bg-white px-6 pt-7 border-y border-300">
    <div class="row">
      <div data-list='{"valueNames":["product","customer","rating","review","time"],"page":6}'>
        <div class="row align-items-end justify-content-between pb-5 g-3">
          <div class="col-auto">
            <h3>Testimonials</h3>
            <p class="text-700 lh-sm mb-0">People what they are think about your service</p>
          </div>
          <div class="col-12 col-md-auto">
            <div class="row g-2">
              <div class="col-auto flex-1">
                <div class="search-box">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control-sm search-input search" type="search" placeholder="Search" aria-label="Search"> <span class="fas fa-search search-box-icon"></span></form>
                </div>
              </div>
              <div class="col-auto">
                  <button class="btn btn-sm btn-phoenix-secondary bg-white hover-bg-100" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New</button>
                  <div class="modal fade" id="staticBackdrop" tabindex="-1" data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header bg-primary">
                          <h5 class="modal-title text-white" id="staticBackdropLabel">Add Testimonial</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1 text-white"></span></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" >
                                <div class="col-md-4 position-relative"><label class="form-label" for="validationTooltip01">First name</label> <input class="form-control" id="validationTooltip01" value="Mark" required="">
                                  <div class="valid-tooltip">Looks good!</div>
                                </div>
                                <div class="col-md-4 position-relative"><label class="form-label" for="validationTooltip02">Last name</label> <input class="form-control" id="validationTooltip02" value="Otto" required="">
                                  <div class="valid-tooltip">Looks good!</div>
                                </div>
                                <div class="col-md-4 position-relative"><label class="form-label" for="validationTooltipUsername">Username</label>
                                  <div class="input-group"><span class="input-group-text" id="validationTooltipUsernamePrepend">@</span><input class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                    <div class="invalid-tooltip">Please choose a unique and valid username.</div>
                                  </div>
                                </div>
                                <div class="col-md-6 position-relative"><label class="form-label" for="validationTooltip03">City</label> <input class="form-control" id="validationTooltip03" required="">
                                  <div class="invalid-tooltip">Please provide a valid city.</div>
                                </div>
                                <div class="col-md-3 position-relative"><label class="form-label" for="validationTooltip04">State</label> <select class="form-select" id="validationTooltip04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>...</option>
                                  </select>
                                  <div class="invalid-tooltip">Please select a valid state.</div>
                                </div>
                                <div class="col-md-3 position-relative"><label class="form-label" for="validationTooltip05">Zip</label> <input class="form-control" id="validationTooltip05" required="">
                                  <div class="invalid-tooltip">Please provide a valid zip.</div>
                                </div>
                               
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                            <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
            </div>
            </div>
          </div>
        </div>
        <div class="table-responsive mx-n1 px-1 scrollbar">
          <table class="table fs--2 mb-0 overflow-hidden">
            <thead>
              <tr>
                <th class="white-space-nowrap fs--1 border-top ps-0 align-middle">
                  <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                </th>
                <th class="sort border-top white-space-nowrap align-middle" scope="col"></th>
                <th class="sort border-top white-space-nowrap align-middle" scope="col" style="min-width:360px;" data-sort="product">PRODUCT</th>
                <th class="sort border-top align-middle" scope="col" data-sort="customer" style="min-width:200px;">CUSTOMER</th>
                <th class="sort border-top align-middle" scope="col" data-sort="rating" style="min-width:110px;">RATING</th>
                <th class="sort border-top align-middle" scope="col" style="max-width:350px;" data-sort="review">REVIEW</th>
                <th class="sort border-top text-start ps-5 align-middle" scope="col" data-sort="status">STATUS</th>
                <th class="sort border-top text-end align-middle" scope="col" data-sort="time">TIME</th>
                <th class="sort border-top text-end pe-0 align-middle" scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody class="list" id="table-latest-review-body">
              <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                <td class="fs--1 align-middle ps-0" style="width: 28px;">
                  <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
                </td>
                <td class="align-middle product white-space-nowrap py-0"><img src="assets/img//products/1.png" alt="" width="53"></td>
                <td class="align-middle product white-space-nowrap" style="min-width:360px;">
                  <h6 class="fw-semi-bold mb-0">Fitbit Sense Advanced Smartwatch with Tools</h6>
                </td>
                <td class="align-middle customer white-space-nowrap" style="min-width:200px;">
                  <div class="d-flex align-items-center">
                    <div class="avatar avatar-l">
                      <div class="avatar-name rounded-circle"><span>R</span></div>
                    </div>
                    <h6 class="mb-0 ms-3 text-900">Richard Dawkins</h6>
                  </div>
                </td>
                <td class="align-middle rating white-space-nowrap" style="min-width:110px;"><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span><span class="fa fa-star text-warning"></span></td>
                <td class="align-middle review" style="min-width:350px;width:500px;">
                  <p class="fs--1 fw-semi-bold text-1000 mb-0">Very helpful to get going with rapid prototype development. Great support via email when I asked question.</p>
                </td>
                <td class="align-middle text-start ps-5 status"><span class="badge fs--1 badge-light-success">Approved<span class="ms-2 fas fa-check"></span></span></td>
                <td class="align-middle text-end time white-space-nowrap">
                  <div class="hover-hide">
                    <h6 class="text-1000 mb-0">Just now</h6>
                  </div>
                </td>
                <td class="align-middle white-space-nowrap text-end pe-0">
                  <div class="position-relative">
                    <div class="hover-actions"><button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button><button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                  </div>
                  <div class="font-sans-serif btn-reveal-trigger"><button class="btn btn-link fs--2 text-600 btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                    <div class="dropdown-menu dropdown-menu-end border py-2"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row align-items-center py-2">
          <div class="pagination d-none"></div>
          <div class="col d-flex fs--1">
            <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info></p><a class="fw-semi-bold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less</a>
          </div>
          <div class="col-auto d-flex"><button class="btn btn-link px-1 me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left me-2"></span>Previous</button><button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Next<span class="fas fa-chevron-right ms-2"></span></button></div>
        </div>
      </div>
    </div>
  </div>

@endsection