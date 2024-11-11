<div class="modal fade boostrap-modal" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content data">

            <div class="modal-body">
                <button type="button" class="close-icon" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line" aria-hidden="true"></i>
                </button>
                <div class="custom-modal-body ">
                    <div class="small-tittle-two border-bottom mb-30 pb-8">
                        <h4 class="title text-capitalize font-600">{{ $data['title'] }} </h4>
                    </div>
                    <div class="all-reply-modal">
                        @forelse ($data['replies'] as $reply)
                            <div class="reply-single-comments radius-12 mb-18">
                                <div class="reply-top">
                                    <div class="reply-user flex-fill mb-7">
                                        <div class="reply-icon mt-6 mb-10">
                                            <i class="ri-message-3-line"></i>
                                        </div>
                                        <div class="flex-fill mr-7">
                                            <p class="reply-description mb-10">{!! @$reply->comment !!}</p>
                                            <p class="text-primary"> - {{ @$reply->user->name }} <span
                                                    class="date text-paragraph">{{ showDateTime(@$reply->created_at) }}</span>
                                                @if (@$reply->created_by == auth()->id() || @hasPermission('forum_delete'))
                                                    <a a class="comment_delete" data-id="{{ encryptFunction(@$reply->id) }}"><i
                                                            class="ri-delete-bin-6-line"></i></a>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-secondary" role="alert">
                                {{ ___('forum.No Reply Found') }}
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('frontend/js/student/__modal.min.js') }}"></script>
