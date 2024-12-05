@extends('admin.layout.master')
@section('content')
<div id="feedbackModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Feedback Details</h2>
            <button class="close-btn">
                <i data-lucide="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="feedback-details">
                <div class="detail-group">
                    <label>Customer Name</label>
                    <p id="customerName"></p>
                </div>
                <div class="detail-group">
                    <label>Email</label>
                    <p id="customerEmail"></p>
                </div>
                <div class="detail-group">
                    <label>Subject</label>
                    <p id="feedbackSubject"></p>
                </div>
                <div class="detail-group">
                    <label>Message</label>
                    <p id="feedbackMessage"></p>
                </div>
                <div class="detail-group">
                    <label>Submitted On</label>
                    <p id="submissionDate"></p>
                </div>
            </div>

            <div class="response-section">
                <h3>Response</h3>
                <form id="responseForm">
                    <input type="hidden" id="feedbackId">
                    <div class="form-group">
                        <label for="responseStatus">Status</label>
                        <select id="responseStatus" required>
                            <option value="new">New</option>
                            <option value="in-progress">In Progress</option>
                            <option value="resolved">Resolved</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="responsePriority">Priority</label>
                        <select id="responsePriority" required>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="responseMessage">Response Message</label>
                        <textarea id="responseMessage" rows="4" required></textarea>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="cancel-btn">Cancel</button>
                        <button type="submit" class="save-btn">Send Response</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection