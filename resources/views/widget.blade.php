<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('front/css/main.css')}}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <div class="flex-1  justify-between flex flex-col h-screen  bg-white ">
        <div id="messages" class="flex flex-col space-y-4 p-4  overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div><span class="px-4 py-2 rounded-2xl inline-block rounded-bl-none bg-gray-300  text-base">Can be verified on any platform using docker Can be verified on any platform using docker</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-1">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div><span class="px-3 py-2 rounded-2xl inline-block rounded-bl-none bg-gray-300  text-base"><img src="admin/images/remitchoice.jpg" alt="" class="w-12"></span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-1">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div><span class="px-4 py-2 rounded-2xl inline-block rounded-br-none bg-customs-color text-white text-base ">Your error message says permission denied, npm global installs must be given root privileges.</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-2">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div><span class="px-3 py-2 rounded-2xl inline-block rounded-br-none bg-customs-color text-white text-base "><img src="admin/images/remitchoice.jpg" alt="" class="w-12"></span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-2">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div><span class="px-4 py-2 rounded-2xl inline-block bg-customs-color text-white text-base">Are you using sudo?</span></div>
                        <div><span class="px-4 py-2 rounded-2xl inline-block rounded-br-none bg-customs-color text-white "></span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-2">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div><span class="px-4 py-2 rounded-2xl inline-block bg-gray-300 text-gray-600 text-base">It seems like you are from Mac OS world. There is no /Users/ folder on linux ?</span></div>
                        <div><span class="px-4 py-2 rounded-2xl inline-block rounded-bl-none bg-gray-300 text-gray-600 text-base">I have no issue with any other packages installed with root permission globally.</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-1">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end justify-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
                        <div><span class="px-4 py-2 rounded-2xl inline-block rounded-br-none bg-customs-color text-white text-base">yes, I have a mac. I never had issues with root permission as well, but this helped me to solve the problem</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1590031905470-a1a1feacbb0b?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-2">
                </div>
            </div>
            <div class="chat-message">
                <div class="flex items-end">
                    <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                        <div><span class="px-4 py-2 rounded-2xl inline-block bg-gray-300 text-gray-600 text-base">I get the same error on Arch Linux (also with sudo)</span></div>
                        <div><span class="px-4 py-2 rounded-2xl inline-block bg-gray-300 text-gray-600 text-base">I also have this issue, Here is what I was doing until now: #1076</span></div>
                        <div><span class="px-4 py-2 rounded-2xl inline-block rounded-bl-none bg-gray-300 text-gray-600 text-base">even i am facing</span></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="My profile" class="w-8 h-8 rounded-full order-1">
                </div>
            </div>
        </div>
        <div class="">
            <div class="relative flex shadow-top py-1">
                <textarea id="messageInput" placeholder="Write your message!" row="3" class="border border-none w-4/5  resize-none focus:outline-none focus:placeholder-gray-400 placeholder-gray-600 py-3 focus:ring focus:ring-transparent pl-4 pr-4 "></textarea>
                <div class="absolute right-0 items-center  bottom-0  sm:flex bg-white pt-1">
                    <div class="inline-flex items-center justify-center">
                        <label for="fileInput" class="cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                            </svg>
                        </label>
                        <input id="fileInput" type="file" class="hidden" />
                    </div>
                    <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const messageInput = document.getElementById('messageInput');
    const adjustTextareaHeight = () => {
        messageInput.style.height = '45';
        const scrollHeight = messageInput.scrollHeight;
        const specificHeight = 100; // Change this value to your desired specific height in pixels
        messageInput.style.height = (scrollHeight > specificHeight) ? `${specificHeight}px` : `${scrollHeight}px`;
    };
    messageInput.addEventListener('input', adjustTextareaHeight);
    adjustTextareaHeight();
</script>
</html>