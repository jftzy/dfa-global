<x-app-layout>
	
	<x-slot name="header">
		<div class="inline-flex items-center justify-between w-full">
		    <h2 class="font-semibold text-lg text-gray-100 leading-tight">
		        {{ __('Data Settings -') }} <span class="text-[#fdc02f]">{{ __('Edit Translation') }}</span>
		    </h2>
		    <small class="font-semibold text-gray-400"><i>Data ID #{{ $translation->id }}</i></small>
		</div>
	</x-slot>

	<x-validation-errors></x-validation-errors>
	<x-alert-success></x-alert-success>


	<div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg mt-4 mx-3 shadow md:flex-row transition ease-in-out delay-150" :class="input_form ? 'block' : 'hidden -translate-y-14 z-[-999]' ">

		<form action="{{ route('settings.store-translations') }}" method="POST" enctype="multipart/form-data" class="w-full p-4 inline-flex gap-5">
			@csrf
			<div class="w-1/2">

			  <div class="mb-3 mt-3">
			    <label for="input_book_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title of the Book</label>
			    <input type="text" id="input_book_title" name="input_book_title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter book title" required value="{{ $translation->book_title }}" />
			  </div>

			  <div class="mb-3 mt-3">
			    <label for="input_author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
			    <input type="text" id="input_author" name="input_author" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter author" required value="{{ $translation->author }}"/>
			  </div>

			  <div class="mb-3 mt-3">
			    <label for="input_translator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Translator</label>
			    <input type="text" id="input_translator" name="input_translator" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter translator" required value="{{ $translation->translator }}"/>
			  </div>

			  <div class="mb-3 mt-3">
			    <label for="input_language" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Langauge</label>
			    <input type="text" id="input_language" name="input_language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter langauge" required value="{{ $translation->language }}"/>
			  </div>

			    <button type="submit" class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
			  	  Submit
			    </button>

			</div>
			<div class="w-1/2">

				<div class="mb-3 mt-3">
				  <label for="input_title_of_book_and_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title of translated book and link</label>
				  <input type="text" id="input_title_of_book_and_link" name="input_title_of_book_and_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter title of translated book and link" required value="{{ $translation->title_of_book_and_link }}"/>
				</div>

				<div class="mb-3 mt-3">
				  <label for="input_year_of_translation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year of publication of translation</label>
				  <input type="text" id="input_year_of_translation" name="input_year_of_translation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter year of publication of translation" required value="{{ $translation->year_of_translation }}"/>
				</div>

				<div class="mb-3 mt-3">
				  <label for="input_publisher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher</label>
				  <input type="text" id="input_publisher" name="input_publisher" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter publisher" required value="{{ $translation->publisher }}"/>
				</div>

				<div class="mt-3">
				  <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="input_file_translations">Upload File</label>
				  <input class="block w-full text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="input_file_translations" id="input_file_translations" name="input_file_translations" type="file" accept="text,.txt,.csv,.pdf,.word,.xlsx,.ppt" value="{{ $translation->file_translations }}">
				</div>

			</div>
		</form>

	</div>
	

</x-app-layout>

<script type="text/javascript">
	
</script>