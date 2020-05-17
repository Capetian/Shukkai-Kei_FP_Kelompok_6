{% extends 'app.volt' %}

{% block content %} 
{% set rt = root| json_decode %}
{% set sb = root.subforum| json_decode %}
<!-- Page Header -->
<header
	class="masthead"
	style="background-color: lightgreen; margin-bottom: 0px;"
>
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading" style="padding: 100px 0;">
					<h1>Thread</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container mt-5">
    <div class="row-center mt-5">
        <form action="{{ url('/Forum/subforum/index') }}" class="d-flex">
			<input
				type="submit"
				class="btn btn-danger align-self-start"
				value="Go Back"
			/>
		</form>
        <div class="col-md-auto bg-light p-5">
            <div class="row justify-content-between">
                <div class="col-6">
                    <div class="row">
                        <h4> {{root.title}} </h4>
                    </div>
                    <div class="row">
                        <h5 class="font-italic"> By {{root.user.username}} </h5>
                    </div>
                </div>
                <div class="col-6 align-self-center">
                    <div class="d-flex justify-content-end row">
                        <h6>Created at: {{date("j-M-y",rt.created_at)}}</h6>
                    </div>

                    <div class="d-flex justify-content-end row">
                        <h6>Last Reply: {{ date("j-M-y",rt.updated_at)}}</h6>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center m-3">
                <div class="row">
                    {% if session.get('auth')['role'] > 0 %}
                        {% if rt.locked == true %}
                        {% set lock = false %}
                        {% set sLock = "Unlock" %}
                        {% else %}
                        {% set lock = true %}
                        {% set sLock = "Lock" %}
                        {% endif %}

                        {% if rt.pinned == true %}
                        {% set pin = false %}
                        {% set sPin = "Unpin" %}
                        {% else %}
                        {% set pin = true %}
                        {% set sPin = "Pin" %}
                        {% endif %}
                        <form class="d-flex form-inline m-1" action="{{url('Forum/thread/lock/')}}" method="POST">
                            <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
        value='<?php echo $this->security->getToken() ?>'/>
                            <input type="hidden" name="l_val" value="{{lock}}">
                            <input type="hidden" name="l_id" value="{{rt.id}}">
                            <button class="btn btn-outline-info pt-3 pb-2" type="submit"><h6 class="h-100">
                                {%- if lock == true -%}
                                <i class="fas fa-lock"></i> {{ sLock }}
                                {%- else -%}
                                <i class="fas fa-lock-open"></i> {{ sLock }}
                                {%- endif -%}
                            </h6></button>
                        </form> 
                        <form class="d-flex form-inline m-1" action="{{url('Forum/thread/pin/')}}" method="POST">
                            <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
        value='<?php echo $this->security->getToken() ?>'/>
                            <input type="hidden" name="p_val" value="{{pin}}">
                            <input type="hidden" name="p_id" value="{{rt.id}}">
                            <button class="btn btn-outline-success pt-3 pb-2" type="submit"><h6 class="h-100">
                                {%- if pin == true -%}
                                <i class="fas fa-thumbtack"></i> {{sPin}}
                                {%- else -%}
                                <i class="fas fa-unlink"></i> {{sPin}}
                                {%- endif -%}
                                </h6></button>
                        </form>
                        {% if session.get('auth')['role'] > 1 %}
                        <form class="d-flex form-inline m-1" action="{{url('Forum/thread/delete/')}}" method="POST">
                            <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
        value='<?php echo $this->security->getToken() ?>'/>
                            <input type="hidden" name="d_id" value="{{rt.id}}">
                            <button class="btn btn-outline-danger pt-3 pb-2" type="submit"><h6 class="h-100"><i class="fas fa-trash"></i> Delete</h6></button>
                        </form>                        
                    </div>
                        {% endif %}
                    {% endif %}
            </div>
            <table class="table border-top border-bottom">
                <tbody class="th text-center">
                    {% for reply in replies %}
                    <tr>
                        <th>
                            <div class="row text-justify p-2">
                                <div class="col-2">
                                    <div class="row">
                                    </div>
                                    <div class="row text-center" >
                                        <a href="{{url('Forum/user/show/') ~ reply.user.id}}"><h6> {{reply.user.username}}</h6></a>
                                    </div>
                                </div>
                                <div class="col-7">
                                    {% if reply.deleted == false %}
                                    <h5> {{reply.content}} </h5>
                                    {% if reply.edited_by is defined %}
                                    <h6 class="font-italic text-muted"> Edited by {{reply.edited_by}} </h6>
                                    {% endif %}
                                    {% else %}
                                    <h6 class="font-italic text-muted"> Deleted by {{reply.edited_by}} </h6>
                                    {% endif %}
                                    
                                </div>
                                <div class="col-3">
                                    <div class="row"> 
                                        {% if  (session.get('forum')['uid'] == reply.user.id  or session.get('auth')['role'] > 0) and reply.deleted == false %}
                                            <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Post</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <form class="form" action="{{url('Forum/thread/edit') }}" method="POST">
                                                        <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
        value='<?php echo $this->security->getToken() ?>'/>
                                                        <input type="hidden" name="e_id" value="{{reply.id}}">
                                                        <input type="hidden" name="e_rid" value="{{rt.id}}">

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <textarea class="form-control" id="content" name="content" placeholder="Edit your reply" >{{reply.content}}</textarea>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Update</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-warning pt-2 pb-2 pl-3 pr-3 m-1" data-toggle="modal" data-target="#myModal">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                        <form class="form-inline" action="{{url('Forum/thread/hide') }}" method="POST">
                                            <input type="hidden" name="h_id" value="{{reply.id}}">
                                                <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
        value='<?php echo $this->security->getToken() ?>'/>
                                            <button class="btn btn-danger pt-2 pb-2 pl-3 pr-3 m-1" type="submit">
                                                <i class="fas fa-eye-slash"></i> Hide
                                            </button>
                                        </form>                                        
                                        {% endif %}
                                    </div>
                                    <div class="row m-2">
                                        <h6 class="text-primary">Posted at: {{date("j-M-y",reply.created_at)}}</h6>
                                    </div>
                                    {% if reply.updated_at != reply.created_at %}
                                        {% if reply.deleted == true %}
                                        <div class="row m-2">
                                            <h6 class="text-danger">Deleted at: {{date("j-M-y",reply.updated_at)}}</h6>
                                        </div>
                                        {% else %} 
                                        <div class="row m-2">
                                            <h6 class="text-secondary">Edited at: {{date("j-M-y",reply.updated_at)}}</h6>
                                        </div>                              
                                        {% endif %}
                                    {% endif %}
                                </div>
                            </div>
                        </th>
                    </tr>

                    {% endfor  %}
                </tbody>
            </table>
            {% if root.locked == 0 and session.get('forum')['uid'] is defined  %} 
            <div class="row">
                <div class="col">
                    <div class="h4 mb-3">Reply to Thread</div>
                        <form action="{{url('Forum/thread/reply') }}" method="POST">
                            <input type='hidden' name='<?php echo $this->security->getTokenKey() ?>'
        value='<?php echo $this->security->getToken() ?>'/>
                            <input type="hidden" name="r_id" value="{{ rt.id }}">
                            <input type="hidden" name="r_uid" value="{{ session.get('forum')['uid'] }}">
                            <input type="hidden" name="r_sid" value="{{sb.id }}">
                            <div class="form-group row pb-1">
                                <div class="col-md">
                                    <textarea class="form-control" id="content" name="content" placeholder="Content..."></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-auto">Reply</button>
                        </form>
                    </div>
                </div>
            </div>
            {% endif %}
        </div>
    </div>
</div>



{% endblock %}