<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-12 py-2.5 bg-white border border-transparent rounded-[20px] font-bold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

{{-- 
Styling Explanation:

- `inline-flex`: Displays the button as an inline element with flexbox.
- `items-center`: Aligns items vertically in the center of the flex container.
- `px-4`: Adds horizontal padding (1rem = 16px).
- `py-2`: Adds vertical padding (0.5rem = 8px).
- `bg-gray-800`: Sets background color to dark gray.
- `border`: Adds a border.
- `border-transparent`: Makes the border invisible.
- `rounded-[20px]`: Applies a border radius of 20px.
- `font-semibold`: Makes the text slightly bold.
- `text-xs`: Sets font size to extra small.
- `text-white`: Sets text color to white.
- `uppercase`: Converts text to uppercase.
- `tracking-widest`: Adds extra spacing between characters.
- `hover:bg-gray-700`: Changes background to lighter gray when hovered.
- `focus:bg-gray-700`: Changes background to lighter gray when focused.
- `active:bg-gray-900`: Changes background to darkest gray when active.
- `focus:outline-none`: Removes the default outline when focused.
- `focus:ring-2`: Adds a 2px focus ring.
- `focus:ring-indigo-500`: Sets focus ring color to indigo.
- `focus:ring-offset-2`: Adds a 2px gap between the focus ring and the element.
- `transition`: Enables smooth animation for state changes.
- `ease-in-out`: Sets a smooth transition curve.
- `duration-150`: Sets animation duration to 150ms.
--}}