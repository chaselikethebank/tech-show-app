<div>
    <dialog class="w-[80vw] h-[80vh] fixed rounded p-5 " id="{{ $dialogId = uniqid() }}">
        <form wire:submit="save" class="flex flex-col gap-4 overflow-auto">
            <label>Test</label>
            <input type="text" wire:model="test" />

            <select>
                <option value="">Customer</option>
            </select>
            <select>
                <option value="">Vehicle</option>
            </select>
            <select>
                <option value="">Technician</option>
            </select>
            <label>Description</label>
            <textarea wire:model='description'>Enter what's wrong with the car here...</textarea>
            <select>
                <option value="">Status</option>
            </select>

            <label>Scheduled At</label>
            <input type="datetime-local" />

            <label>Started At</label>
            <input type="datetime-local" />

            <label>Completed At</label>
            <input type="datetime-local" />

            <label>Estimated Cost</label>
            <input type="number" />

            <label>Final Cost</label>
            <input type="number" />

            <label>Notes</label>
            <textarea>Special</textarea>

            <label>Recall Notes</label>
            <textarea>Recal notes</textarea>

            <label>Customer Feedback</label>
            <textarea>Customer Feedback</textarea>

            <label>Service Description</label>
            <textarea>Service Description</textarea>

            <label>Service Duration (Hours)</label>
            <input type="number" />

            <label>Additional Costs</label>
            <textarea>Additional Costs</textarea>

            <label>Quality Assurance Check Performed</label>
            <input type="radio" value="1" name="quality-assurance-check">Yes</input>
            <input type="radio" value="0" name="quality-assurance-check" checked>No</input>

            <label>Post Service Follow Up</label>
            <input type="datetime-local" />

            <label>Service Warranty</label>
            <textarea>Service Warranty</textarea>

            <label>Customer Signature Image</label>
            <input type="file" />

            <label>Service Photos</label>
            <textarea>Service Photos links</textarea>

            <label>Referral Source</label>
            <textarea>Referral Source</textarea>

            <label>Follow Up Actions</label>
            <select>
                <option value="none">None</option>
                <option value="call">Call</option>
                <option value="email">Email</option>
                <option value="text">Text</option>
            </select>

            <label>Turnaround Time</label>
            <div>
                <label>Weeks</label>
                <input type="number">

                <label>Days</label>
                <input type="number">

                <label>Hours</label>
                <input type="number">
            </div>

            <label>Customer Approval with Signature</label>
            <input type="radio" value="1" name="customer-approval">Yes</input>
            <input type="radio" value="0" name="customer-approval" checked>No</input>

            <button type="submit">Submit</button>

        </form>
        <form method="dialog">
            <button>Close</button>
        </form>

    </dialog>
    <button onclick="document.getElementById('{{ $dialogId }}').showModal()">Start new Work Order test</button>

</div>
