const t = [
    {
        name: "estimate delivery 1",
        content: `Hi {{client.name}},

Your estimate for {{estimate.description}} is ready!  You can review and download it securely online: {{estimate.link}}

If you have any questions or would like to proceed, just hit reply to this email.

Thanks,
{{business.name}}`,
    },

    {
        name: "estimate delivery 2",
        content: `Hi {{client.name}},
We've prepared your estimate for {{estimate.description}}.

With this estimate, you can:

* Review it online
* Accept it with a click
* Ask any questions directly through this email

Check out your estimate here: {{estimate.link}}

Thanks,
{{business.name}}`,
    },

    {
        name: "estimate follow up 1",
        content: `Hi {{client.name}},
Just wanted to check if you had a chance to review your estimate.  Let me know if you have any questions or are ready to proceed!

Here's the link again: {{estimate.link}}

Thanks,
{{business.name}}`,
    },
];

console.log(JSON.stringify(t));
