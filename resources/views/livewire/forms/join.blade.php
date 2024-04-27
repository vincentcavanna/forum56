<form wire:submit="save" class="flex flex-col">
    <div class="mt-10 flex flex-col md:flex-row justify-between">
        <x-forms.styled-input name="first_name" label="First name" placeholder="First name" model="first_name"
                              :required="true"/>
        @error('first_name') <p class="text-error">{{$message}}</p> @enderror
        <x-forms.styled-input name="last_name" label="Last name" placeholder="Last name" model="last_name"
                              :required="true"/>
    </div>
    <x-select name="gender" label="Gender"
              :options="$genderOpts" disabled-label="Gender" :required="true"/>
    <x-forms.styled-input name="email" label="Email" placeholder="Email" type="email" model="email" :required="true"/>
    <x-forms.styled-input name="phone" label="Phone"
                          model="phone" :required="true"/>
    <x-forms.styled-input name="linkedin" label="LinkedIn" placeholder="https://www.linkedin.com/in/yourprofile"
                          type="url" model="linkedin"/>
    <x-forms.styled-input name="interests" label="Interests"
                          placeholder="What are you looking for?"
                          model="interests"/>
    <button class="my-2 rounded bg-contrast-dark text-white p-3" type="submit">Submit</button>
</form>
