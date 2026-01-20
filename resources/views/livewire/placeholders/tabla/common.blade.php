<div>
    <section class="mt-10">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex items-center justify-between p-4">
                    <div class="flex">
                        <div class="relative w-full">
                            <div class="h-10 bg-gray-300 rounded animate-pulse"></div>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <div class="w-80 h-4 bg-gray-300 rounded animate-pulse"></div>
                            <div class="w-48 h-10 bg-gray-300 rounded animate-pulse"></div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                @for($i = 0; $i < 5; $i++)
                                    <th class="px-4 py-3">
                                        <div class="h-4 bg-gray-300 rounded animate-pulse"></div>
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0; $i < 5; $i++)
                                <tr class="border-b">
                                    @for($j = 0; $j < 5; $j++)
                                        <td class="px-4 py-3">
                                            <div class="h-4 bg-gray-200 rounded animate-pulse"></div>
                                        </td>
                                    @endfor
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="py-4 px-3">
                    <div class="flex space-x-4 items-center">
                        <div class="w-32 h-4 bg-gray-300 rounded animate-pulse"></div>
                        <div class="w-48 h-10 bg-gray-300 rounded animate-pulse"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>