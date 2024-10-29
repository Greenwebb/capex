
<div class="modal fade" id="update_interest_details" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-body py-2">
                <h5 class="text-secondary fw-bold">Update Loan Interest Details</h5>

                <form id="modalForm" class="gap-4">
                    <div class="flex gap-4">
                        <div>
                            <label for="interest_type">Interest Type</label>
                            <select type="text" id="interest_type" name="interest_type" class="form-control">
                                <option value="Percentage">Percentage</option>
                                <option value="Fixed">Fixed</option>
                            </select>
                        </div>
                        <div>
                            <label for="interest">Interest Value</label>
                            <input type="text" id="interest" name="interest" class="form-control">
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary my-4" id="keepChangesBtn" data-bs-dismiss="modal">Keep Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("keepChangesBtn").addEventListener("click", function () {
        // Get values from modal inputs
        const interestType = document.getElementById("interest_type").value;
        const interestValue = document.getElementById("interest").value;

        // Create hidden inputs
        const inputInterestType = document.createElement("input");
        // inputInterestType.type = "hidden";
        inputInterestType.name = "interest_type";
        inputInterestType.value = interestType;
        inputInterestType.disabled = true; // Set to disabled

        const inputInterestValue = document.createElement("input");
        // inputInterestValue.type = "hidden";
        inputInterestValue.name = "interest";
        inputInterestValue.value = interestValue;
        inputInterestValue.disabled = true; // Set to disabled

        // Append inputs to the main form
        const mainForm = document.getElementById("mainFormmm");
        mainForm.appendChild(inputInterestType);
        mainForm.appendChild(inputInterestValue);
    });
</script>
