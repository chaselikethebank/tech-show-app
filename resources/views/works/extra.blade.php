<!-- resources/views/works/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
            {{ __('Works') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">

                    @if (session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('works.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <!-- Form Inputs -->
                            <div class="space-y-4">
                                <div>
                                    <label for="test"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Test</label>
                                    <input type="text" name="test" id="test" wire:model="test"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                </div>

                                <div>
                                    <label for="customer"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer</label>
                                    <select name="customer" id="customer"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        <option value="">Customer</option>
                                        <!-- Add customer options here -->
                                    </select>
                                </div>

                                <div>
                                    <label for="vehicle"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Vehicle</label>
                                    <select name="vehicle" id="vehicle"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        <option value="">Vehicle</option>
                                        <!-- Add vehicle options here -->
                                    </select>
                                </div>

                                <div>
                                    <label for="technician"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Technician</label>
                                    <select name="technician" id="technician"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        <option value="">Technician</option>
                                        <!-- Add technician options here -->
                                    </select>
                                </div>

                                <div>
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                    <textarea name="description" id="description" rows="3" wire:model='description'
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Enter what's wrong with the car here...</textarea>
                                </div>

                                <div>
                                    <label for="status"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                    <select name="status" id="status"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        <option value="">Status</option>
                                        <!-- Add status options here -->
                                    </select>
                                </div>

                                <div>
                                    <label for="scheduled_at"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Scheduled
                                        At</label>
                                    <input type="datetime-local" name="scheduled_at" id="scheduled_at"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="started_at"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Started
                                        At</label>
                                    <input type="datetime-local" name="started_at" id="started_at"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="completed_at"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Completed
                                        At</label>
                                    <input type="datetime-local" name="completed_at" id="completed_at"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="estimated_cost"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estimated
                                        Cost</label>
                                    <input type="number" name="estimated_cost" id="estimated_cost"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="final_cost"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Final
                                        Cost</label>
                                    <input type="number" name="final_cost" id="final_cost"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <label for="notes"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Notes</label>
                                    <textarea name="notes" id="notes"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Special</textarea>
                                </div>

                                <div>
                                    <label for="recall_notes"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Recall
                                        Notes</label>
                                    <textarea name="recall_notes" id="recall_notes"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Recal notes</textarea>
                                </div>

                                <div>
                                    <label for="customer_feedback"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer
                                        Feedback</label>
                                    <textarea name="customer_feedback" id="customer_feedback"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Customer Feedback</textarea>
                                </div>

                                <div>
                                    <label for="service_description"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
                                        Description</label>
                                    <textarea name="service_description" id="service_description"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Service Description</textarea>
                                </div>

                                <div>
                                    <label for="service_duration"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
                                        Duration (Hours)</label>
                                    <input type="number" name="service_duration" id="service_duration"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="additional_costs"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Additional
                                        Costs</label>
                                    <textarea name="additional_costs" id="additional_costs"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Additional Costs</textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quality
                                        Assurance Check Performed</label>
                                    <div class="flex items-center space-x-4">
                                        <div>
                                            <input type="radio" value="1" name="quality_assurance_check"
                                                id="quality_assurance_check_yes"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="quality_assurance_check_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" value="0" name="quality_assurance_check"
                                                id="quality_assurance_check_no" checked
                                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="quality_assurance_check_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label for="post_service_follow_up"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Post Service
                                        Follow Up</label>
                                    <input type="datetime-local" name="post_service_follow_up"
                                        id="post_service_follow_up"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="service_warranty"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
                                        Warranty</label>
                                    <textarea name="service_warranty" id="service_warranty"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Service Warranty</textarea>
                                </div>

                                <div>
                                    <label for="customer_signature_image"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer
                                        Signature Image</label>
                                    <input type="file" name="customer_signature_image"
                                        id="customer_signature_image"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600" />
                                </div>

                                <div>
                                    <label for="service_photos"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service
                                        Photos</label>
                                    <textarea name="service_photos" id="service_photos"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Service Photos links</textarea>
                                </div>

                                <div>
                                    <label for="referral_source"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Referral
                                        Source</label>
                                    <textarea name="referral_source" id="referral_source"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">Referral Source</textarea>
                                </div>

                                <div>
                                    <label for="follow_up_actions"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Follow Up
                                        Actions</label>
                                    <select name="follow_up_actions" id="follow_up_actions"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        <option value="none">None</option>
                                        <option value="call">Call</option>
                                        <option value="email">Email</option>
                                        <option value="text">Text</option>
                                    </select>
                                </div>

                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Turnaround
                                        Time</label>
                                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                        <div>
                                            <label for="turnaround_weeks"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Weeks</label>
                                            <input type="number" name="turnaround_weeks" id="turnaround_weeks"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        </div>
                                        <div>
                                            <label for="turnaround_days"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Days</label>
                                            <input type="number" name="turnaround_days" id="turnaround_days"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        </div>
                                        <div>
                                            <label for="turnaround_hours"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hours</label>
                                            <input type="number" name="turnaround_hours" id="turnaround_hours"
                                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:border-gray-600">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer
                                        Approval with Signature</label>
                                    <div class="flex items-center space-x-4">
                                        <div>
                                            <input type="radio" value="1" name="customer_approval"
                                                id="customer_approval_yes"
                                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="customer_approval_yes" class="ml-2">Yes</label>
                                        </div>
                                        <div>
                                            <input type="radio" value="0" name="customer_approval"
                                                id="customer_approval_no" checked
                                                class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="customer_approval_no" class="ml-2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-4 space-x-4">
                            <button type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">Submit</button>
                            <x-link-with-arrow :route="'tasks.index'" type="button">
                                Create Estimate
                            </x-link-with-arrow>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
</x-app-layout>
