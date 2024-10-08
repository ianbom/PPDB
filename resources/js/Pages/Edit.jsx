
// resources/js/Pages/Edit.jsx
import React, { useState } from 'react';
import { router } from '@inertiajs/react'

export default function Edit({ post }) {
    const [values, setValues] = useState({ // Form fields
        title: post.title,
        body: post.title
    });

    function handleChange(e) {
        const key = e.target.id;
        const value = e.target.value
        setValues(values => ({
            ...values,
            [key]: value,
        }))
    }

    function handleSubmit(e) {
        e.preventDefault()
        console.log('ini post :', post)
        console.log('apa ini : ', post.id)
        router.put(route('post.update', post.id), values);
    }

    return (
        <>
            <h1>Edit Post</h1>
            <hr/>
            <form onSubmit={handleSubmit}>
                <label htmlFor="title">Title:</label>
                <input id="title" value={values.title} onChange={handleChange} />

                <label htmlFor="body">Body:</label>
                <textarea id="body" value={values.body} onChange={handleChange}></textarea>
                <button type="submit">Update</button>
            </form>
        </>
    )
}
